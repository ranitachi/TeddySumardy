<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\LaporanVentura;
use App\Models\LaporanKeuangan;

use Validator;
use Auth;
use DB;

class LaporanKeuanganController extends Controller
{
    public function show($id)
    {
        $ventura = LaporanVentura::with('laporan_keuangan')->find($id);

        $termin_ke = 1;
        if (!is_null($ventura->laporan_keuangan)) {
            $termin_ke = $ventura->laporan_keuangan->count() + 1;
        }

        $total_realisasi = 0;
        foreach ($ventura->laporan_keuangan as $lk) {
            $total_realisasi += $lk->nilai_termin;
        }

        $presentase = round($total_realisasi * 100 / $ventura->nilai_dengan_pajak, 2);

        return view('backend.pages.laporan-keuangan.index')
            ->with('total_realisasi', $total_realisasi)
            ->with('presentase', $presentase)
            ->with('termin_ke', $termin_ke)
            ->with('ventura', $ventura);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_laporan_ventura' => 'required',
            'tanggal_pembayaran' => 'required',
            'nilai_termin' => 'required',
        ])->validate();

        if (is_null($request->termin)) {
            $insert = LaporanKeuangan::create($request->all());        

            return redirect()->route('laporan-keuangan.show', $request->id_laporan_ventura)
            ->with('success', 'Anda berhasil memasukkan data pembayaran.');
        }
        
        $request->merge(['termin' => $request->termin]);
        $insert = LaporanKeuangan::create($request->all());
        
        return redirect()->route('laporan-keuangan.show', $request->id_laporan_ventura)
            ->with('success', 'Anda berhasil memasukkan data pembayaran.');
    }

    public function kontribusi(Request $request, $id)
    {
        Validator::make($request->all(), [
            'kontribusi' => 'required',
        ])->validate();

        $update = LaporanKeuangan::find($id);
        $update->nilai_kontribusi = $request->kontribusi;
        $update->save();

        return redirect()->route('laporan-keuangan.show', $update->id_laporan_ventura)
            ->with('success', 'Anda berhasil memasukkan nilai kontribusi UI.');
    }
}
