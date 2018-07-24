<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Galeri;
use Validator;
use Auth;
use File;
use DB;

class GaleriFotoController extends Controller
{
    public function index()
    {
        $galeri = Galeri::where('type', 1)->paginate(12);

        return view('backend.pages.galeri-foto.index')->with('galeri', $galeri);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'file' => 'required|image|mimes:jpg,jpeg,png',
        ])->validate();

        DB::transaction(function() use($request) {
            $file = $request->file('file');
            $path = public_path().'/galeri/foto/';
            $filename = time()."_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
            $file->move($path, $filename);
            
            $insert = new Galeri;
            $insert->judul = $request->judul;
            $insert->file = $filename;
            $insert->type = 1; // foto
            $insert->save();
        });
        
        return redirect()->route('galeri-foto.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return Galeri::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
        ])->validate();

        DB::transaction(function() use($request, $id) {
            $update = Galeri::find($id);
            $update->judul = $request->judul;
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = public_path().'/galeri/foto/';

                File::delete($path.$update->file);

                $filename = time()."_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
                $file->move($path, $filename);
                
                $update->file = $filename;
            }
            
            $update->save();
        });

        return redirect()->route('galeri-foto.index')
            ->with('success', 'Anda telah mengubah data galeri foto.');
    }

    public function destroy($id)
    {
        $delete = Galeri::find($id);
        
        DB::transaction(function() use($delete, $id){
            File::delete(public_path().'/galeri/foto/'.$delete->file);
            
            Galeri::destroy($id);
        });

        return redirect()->route('galeri-foto.index')
            ->with('success', 'Anda telah menghapus data galeri.');
    }
}
