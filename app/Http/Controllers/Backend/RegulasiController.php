<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Regulasi;
use Validator;
use Auth;
use File;
use DB;

class RegulasiController extends Controller
{
    public function index()
    {
        $regulasi = Regulasi::all();

        return view('backend.pages.regulasi.index')->with('regulasi', $regulasi);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf',
        ])->validate();

        DB::transaction(function() use($request) {
            $file = $request->file('file');
            $path = public_path().'/regulasi/';
            $filename = time()."_regulasi_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
            $file->move($path, $filename);
            
            $insert = new Regulasi;
            $insert->judul = $request->judul;
            $insert->file = $filename;
            $insert->save();
        });
        
        return redirect()->route('regulasi.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return Regulasi::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
        ])->validate();

        DB::transaction(function() use($request, $id) {
            $update = Regulasi::find($id);
            $update->judul = $request->judul;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = public_path().'/regulasi/';

                File::delete($path.$update->file);

                $filename = time()."_regulasi_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
                $file->move($path, $filename);
                
                $update->file = $filename;
            }
            
            $update->save();
        });

        return redirect()->route('regulasi.index')
            ->with('success', 'Anda telah mengubah data regulasi.');
    }

    public function destroy($id)
    {
        $delete = Regulasi::find($id);
        
        DB::transaction(function() use($delete, $id){
            File::delete(public_path().'/regulasi/'.$delete->file);
            
            Regulasi::destroy($id);
        });

        return redirect()->route('regulasi.index')
            ->with('success', 'Anda telah menghapus data kategori.');
    }
}
