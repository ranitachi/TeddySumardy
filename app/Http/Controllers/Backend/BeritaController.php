<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KategoriBerita;
use App\Models\Berita;
use Validator;
use Image;
use Input;
use Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::with('kategori')->get();

        return view('backend.pages.berita.index')
            ->with('data', $data);
    }
    
    public function create()
    {
        $kategori = KategoriBerita::all();

        return view('backend.pages.berita.create')
            ->with('kategori', $kategori);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_kategori' => 'required',
            'judul' => 'required',
            'konten' => 'required',
        ])->validate();

        $insert = new Berita;
        $insert->id_kategori = $request->id_kategori;
        $insert->id_author = Auth::user()->id;
        $insert->judul = $request->judul;
        $insert->slug = str_slug($request->judul);
        $insert->konten = $request->konten;
        $insert->foto_utama = null;

        if ($request->hasFile('foto_utama')) {
            $file = $request->file('foto_utama');
            $path = public_path().'/images/';
            $filename = time()."_artikel_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
            $file->move($path, $filename);
            
            $insert->foto_utama = $filename;
        }
        
        $insert->save();

        return redirect()->route('berita.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $data = Berita::find($id);
        $kategori = KategoriBerita::all();

        return view('backend.pages.berita.edit')
            ->with('kategori', $kategori)
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'id_kategori' => 'required',
            'judul' => 'required',
            'konten' => 'required',
        ])->validate();

        $insert = Berita::find($id);
        $insert->id_kategori = $request->id_kategori;
        $insert->id_author = Auth::user()->id;
        $insert->judul = $request->judul;
        $insert->slug = str_slug($request->judul);
        $insert->konten = $request->konten;

        if ($request->hasFile('foto_utama')) {
            $file = $request->file('foto_utama');
            $path = public_path().'/images/';
            $filename = time()."_artikel_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
            $file->move($path, $filename);
            
            $insert->foto_utama = $filename;
        }
        
        $insert->save();

        return redirect()->route('berita.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function destroy($id)
    {
        Berita::destroy($id);

        return redirect()->route('berita.index')
            ->with('success', 'Anda telah menghapus data berita.');
    }
}
