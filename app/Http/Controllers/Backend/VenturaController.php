<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Ventura;
use Validator;
use Auth;
use DB;

class VenturaController extends Controller
{
    public function index()
    {
        $data = Ventura::all();

        return view('backend.pages.ventura.index')
            ->with('data', $data);
    }

    public function create()
    {
        return view('backend.pages.ventura.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
            'pimpinan' => 'required',
            'sejarah' => 'required',
            'visi_misi' => 'required',
            'deskripsi' => 'required',
            'web' => 'required',
        ])->validate();

        $find = Ventura::latest()->first();

        $request->merge(['slug' => str_slug($request->nama)]);
        $request->merge(['urut' => ($find->urut + 1)]);
        $insert = Ventura::create($request->all());

        return redirect()->route('ventura.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $data = Ventura::find($id);

        return view('backend.pages.ventura.edit')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
            'pimpinan' => 'required',
            'sejarah' => 'required',
            'visi_misi' => 'required',
            'deskripsi' => 'required',
            'web' => 'required',
        ])->validate();

        $insert = Ventura::find($id)->update($request->all());

        return redirect()->route('ventura.index')
            ->with('success', 'Anda telah mengubah data.');
    }

    public function destroy($id)
    {
        Ventura::destroy($id);

        return redirect()->route('ventura.index')
            ->with('success', 'Anda telah menghapus data.');
    }
}
