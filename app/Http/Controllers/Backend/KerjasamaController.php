<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DokumenKerjasama;
use App\Models\SifatKerjasama;
use App\Models\Kerjasama;
use App\Models\Instansi;
use Validator;
use Auth;
use DB;

class KerjasamaController extends Controller
{
    public function index()
    {
        $kerjasama = Kerjasama::all();

        return view('backend.pages.kerjasama.index')->with('kerjasama', $kerjasama);
    }

    public function create()
    {
        $instansi = Instansi::all();
        $sifat = SifatKerjasama::all();

        return view('backend.pages.kerjasama.create')
            ->with('sifat', $sifat)
            ->with('instansi', $instansi);
    }

    public function store(Request $request)
    {   
        Validator::make($request->all(), [
            'no_naskah' => 'required',
            'nama_dokumen' => 'required',
            'path' => 'required',
        ])->validate();

        DB::transaction(function() use($request){
            $kerjasama = Kerjasama::create($request->all()); 

            $jumlah_file = collect($request->path)->count();
            $file = $request->file('path');

            for ($i=0; $i < $jumlah_file; $i++) { 
                $filename = time()."_kerjasama_"."authorid".Auth::user()->id."_".strtolower($file[$i]->getClientOriginalName());
                $file[$i]->storeAs('kerjasama', $filename);
                
                $insert = new DokumenKerjasama;
                $insert->id_kerjasama = $kerjasama->id;
                $insert->nama_dokumen = $request->nama_dokumen[$i];
                $insert->path = $filename;
                $insert->save();
            }
        });

        return redirect()->route('kerjasama.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $instansi = Instansi::all();
        $sifat = SifatKerjasama::all();
        $data = Kerjasama::with('dokumen_kerjasama')->find($id);

        return view('backend.pages.kerjasama.edit')
            ->with('sifat', $sifat)
            ->with('instansi', $instansi)
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'no_naskah' => 'required',
            'id_instansi' => 'required',
            'id_sifat_kerjasama' => 'required',
            'kegiatan' => 'required',
            'jenis_perjanjian' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'manfaat' => 'required',
            'keterangan' => 'required',
        ])->validate();

        DB::transaction(function() use($request, $id){
            $kerjasama = Kerjasama::find($id)->update($request->all()); 

            $jumlah_file = collect($request->path)->count();
            $file = $request->file('path');

            for ($i=0; $i < $jumlah_file; $i++) { 
                $filename = time()."_kerjasama_"."authorid".Auth::user()->id."_".strtolower($file[$i]->getClientOriginalName());
                $file[$i]->storeAs('kerjasama', $filename);
                
                $insert = new DokumenKerjasama;
                $insert->id_kerjasama = $id;
                $insert->nama_dokumen = $request->nama_dokumen[$i];
                $insert->path = $filename;
                $insert->save();
            }
        });

        return redirect()->route('kerjasama.index')
            ->with('success', 'Anda telah mengubah data kerjasama.');
    }

    public function destroy($id)
    {
        Kerjasama::destroy($id);

        return redirect()->route('kerjasama.index')
            ->with('success', 'Anda telah menghapus data kerjasama.');
    }

    public function download($filename)
    {
        if (!auth()->check()) {
            return abort(404);
        }
        return response()->download(storage_path('app/kerjasama/'.$filename));
    }

    public function detail($id)
    {
        return Kerjasama::where('id', $id)
            ->with('dokumen_kerjasama')
            ->with('instansi')
            ->with('sifat_kerjasama')
            ->first();
    }
}
