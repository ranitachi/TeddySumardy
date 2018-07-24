<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\UsulanKerjasama;
use App\Models\DokumenUsulan;
use App\Models\PivotUsulan;
use Validator;
use Auth;
use File;
use DB;

class UsulanKerjasamaController extends Controller
{
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_sifat_kerjasama' => 'required',
            'nama_pengusul' => 'required',
            'no_telp' => 'required|numeric',
            'email' => 'required|email',
            'instansi' => 'required',
            'jenis_kegiatan' => 'required',
            'lokasi' => 'required',
            'manfaat' => 'required',
            'nama_dokumen' => 'required',
            'path' => 'required',
        ])->validate();

        DB::transaction(function() use($request){
            $idtracking = $this->generate_id_tracking();
            
            $request->merge(['id_tracking' => $idtracking]);
            $request->merge(['id_status_usulan' => 1]);
            $usulan = UsulanKerjasama::create($request->all()); 

            $pivot = new PivotUsulan;
            $pivot->id_usulan = $usulan->id;
            $pivot->id_status = 1; // default status is MKV
            $pivot->keterangan = "Menunggu proses verifikasi dokumen."; // default value for keterangan
            $pivot->tanggal = date('Y-m-d');
            $pivot->save();

            $jumlah_file = collect($request->path)->count();
            $file = $request->file('path');

            for ($i=0; $i < $jumlah_file; $i++) { 
                $filename = time()."_usulan_".strtolower($file[$i]->getClientOriginalName());
                $file[$i]->storeAs('usulan', $filename);
                
                $insert = new DokumenUsulan;
                $insert->id_usulan_kerjasama = $usulan->id;
                $insert->nama_dokumen = $request->nama_dokumen[$i];
                $insert->path = $filename;
                $insert->save();
            }
        });

        return redirect()->route('kerjasama.ajukan')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function generate_id_tracking()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 12; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        return $string;
    }
}
