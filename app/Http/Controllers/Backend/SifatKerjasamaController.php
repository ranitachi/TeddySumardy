<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SifatKerjasama;
use Validator;

class SifatKerjasamaController extends Controller
{
    public function index()
    {
        $sifat_kerjasama = SifatKerjasama::all();

        return view('backend.pages.sifat-kerjasama.index')->with('sifat_kerjasama', $sifat_kerjasama);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'sifat' => 'required',
        ])->validate();

        $insert = SifatKerjasama::create($request->all());

        return redirect()->route('sifat-kerjasama.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return SifatKerjasama::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'sifat' => 'required',
        ])->validate();

        $update = SifatKerjasama::find($id)->update($request->all());

        return redirect()->route('sifat-kerjasama.index')
            ->with('success', 'Anda telah mengubah data sifat kerjasama.');
    }

    public function destroy($id)
    {
        SifatKerjasama::destroy($id);

        return redirect()->route('sifat-kerjasama.index')
            ->with('success', 'Anda telah menghapus data sifat kerjasama.');
    }
}
