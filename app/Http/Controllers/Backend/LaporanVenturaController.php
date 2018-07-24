<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\LaporanVentura;
use App\Models\DokumenVentura;
use App\Models\Client;
use Validator;
use Auth;
use File;
use DB;

class LaporanVenturaController extends Controller
{
    public function index()
    {
        $laporan = LaporanVentura::where('id_ventura', Auth::user()->ventura->id)->get();

        return view('backend.pages.laporan-ventura.index')
            ->with('laporan', $laporan);
    }

    public function getall()
    {
        $laporan = LaporanVentura::all();

        return view('backend.pages.laporan-ventura.index')
            ->with('laporan', $laporan);
    }

    public function create()
    {
        $client = Client::where('id_ventura', Auth::user()->ventura->id)->get();

        return view('backend.pages.laporan-ventura.create')
            ->with('client', $client);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_client' => 'required',
            'no_kontrak' => 'required',
            'jenis_kontrak' => 'required',
            'nama_pekerjaan' => 'required',
            'jenis_penugasan' => 'required',
            'lokasi_pekerjaan' => 'required',
            'nilai_tanpa_pajak' => 'required',
            'nilai_dengan_pajak' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jenis_pembayaran' => 'required',
            'jumlah_dosen_terlibat' => 'required',
            'jumlah_staf_lembaga_terlibat' => 'required',
            'jumlah_konsultan_terlibat' => 'required',
            'nama_dokumen' => 'required',
            'path' => 'required',
        ])->validate();

        DB::transaction(function() use($request){
            $ntp = str_replace(',', '', $request->nilai_tanpa_pajak);
            $ndp = str_replace(',', '', $request->nilai_dengan_pajak);

            $request->merge(['id_ventura' => Auth::user()->ventura->id]);
            $request->merge(['tanggal_laporan' => date('Y-m-d')]);
            $request->merge(['realisasi' => 0]);
            $request->merge(['nilai_tanpa_pajak' => $ntp]);
            $request->merge(['nilai_dengan_pajak' => $ndp]);

            $laporan = LaporanVentura::create($request->all()); 

            $jumlah_file = collect($request->path)->count();
            $file = $request->file('path');

            for ($i=0; $i < $jumlah_file; $i++) { 
                $filename = time()."_ventura_"."authorid".Auth::user()->id."_".strtolower($file[$i]->getClientOriginalName());
                $file[$i]->storeAs('ventura', $filename);
                
                $insert = new DokumenVentura;
                $insert->id_ventura = $laporan->id;
                $insert->nama_dokumen = $request->nama_dokumen[$i];
                $insert->path = $filename;
                $insert->save();
            }
        });

        return redirect()->route('laporan-ventura.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $client = Client::where('id_ventura', Auth::user()->ventura->id)->get();
        $data = LaporanVentura::with('dokumen_ventura')->find($id);

        return view('backend.pages.laporan-ventura.edit')
            ->with('data', $data)
            ->with('client', $client);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'id_client' => 'required',
            'no_kontrak' => 'required',
            'jenis_kontrak' => 'required',
            'nama_pekerjaan' => 'required',
            'jenis_penugasan' => 'required',
            'lokasi_pekerjaan' => 'required',
            'nilai_tanpa_pajak' => 'required',
            'nilai_dengan_pajak' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jenis_pembayaran' => 'required',
            'jumlah_dosen_terlibat' => 'required',
            'jumlah_staf_lembaga_terlibat' => 'required',
            'jumlah_konsultan_terlibat' => 'required',
        ])->validate();

        DB::transaction(function() use($request, $id){
            $ntp = str_replace(',', '', $request->nilai_tanpa_pajak);
            $ndp = str_replace(',', '', $request->nilai_dengan_pajak);

            $request->merge(['id_ventura' => Auth::user()->ventura->id]);
            $request->merge(['tanggal_laporan' => date('Y-m-d')]);
            $request->merge(['realisasi' => 0]);
            $request->merge(['nilai_tanpa_pajak' => $ntp]);
            $request->merge(['nilai_dengan_pajak' => $ndp]);

            $laporan = LaporanVentura::find($id)->update($request->all()); 

            $jumlah_file = collect($request->path)->count();
            $file = $request->file('path');

            for ($i=0; $i < $jumlah_file; $i++) { 
                $filename = time()."_ventura_"."authorid".Auth::user()->id."_".strtolower($file[$i]->getClientOriginalName());
                $file[$i]->storeAs('ventura', $filename);
                
                $insert = new DokumenVentura;
                $insert->id_ventura = $id;
                $insert->nama_dokumen = $request->nama_dokumen[$i];
                $insert->path = $filename;
                $insert->save();
            }
        });

        return redirect()->route('laporan-ventura.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function detail($id)
    {
        $laporan = LaporanVentura::with('ventura')->find($id);

        // if (Auth::user()->ventura->id != $laporan->id_ventura) {
        //     return abort(404);
        // }

        $total_realisasi = 0;
        foreach ($laporan->laporan_keuangan as $lk) {
            $total_realisasi += $lk->nilai_termin;
        }

        $belum_bayar = $laporan->nilai_dengan_pajak - $total_realisasi;

        $total_realisasi = 0;
        foreach ($laporan->laporan_keuangan as $lk) {
            $total_realisasi += $lk->nilai_termin;
        }

        $presentase = round($total_realisasi * 100 / $laporan->nilai_dengan_pajak, 2);
        

        return view('backend.pages.laporan-ventura.detail')
            ->with('persentase', $presentase)
            ->with('sudah_dibayar', $total_realisasi)
            ->with('belum_dibayar', $belum_bayar)
            ->with('laporan', $laporan);
    }
}
