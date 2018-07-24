<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategori = KategoriBerita::all();

        return view('backend.pages.kategori.index')->with('kategori', $kategori);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'kategori' => 'required',
        ])->validate();

        $request->merge(['slug' => str_slug($request->kategori)]);        
        $insert = KategoriBerita::create($request->all());

        return redirect()->route('kategori-berita.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return KategoriBerita::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'kategori' => 'required',
        ])->validate();

        $request->merge(['slug' => str_slug($request->kategori)]);
        $update = KategoriBerita::find($id)->update($request->all());

        return redirect()->route('kategori-berita.index')
            ->with('success', 'Anda telah mengubah data kategori.');
    }

    public function destroy($id)
    {
        KategoriBerita::destroy($id);

        return redirect()->route('kategori-berita.index')
            ->with('success', 'Anda telah menghapus data kategori.');
    }
}
