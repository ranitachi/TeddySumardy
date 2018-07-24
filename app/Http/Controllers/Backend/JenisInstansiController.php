<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\JenisInstansi;
use Validator;

class JenisInstansiController extends Controller
{
    public function index()
    {
        $jenis_instansi = JenisInstansi::all();

        return view('backend.pages.jenis-instansi.index')->with('jenis_instansi', $jenis_instansi);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
        ])->validate();

        $insert = JenisInstansi::create($request->all());

        return redirect()->route('jenis-instansi.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return JenisInstansi::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
        ])->validate();

        $update = JenisInstansi::find($id)->update($request->all());

        return redirect()->route('jenis-instansi.index')
            ->with('success', 'Anda telah mengubah data jenis instansi.');
    }

    public function destroy($id)
    {
        JenisInstansi::destroy($id);

        return redirect()->route('jenis-instansi.index')
            ->with('success', 'Anda telah menghapus data jenis instansi.');
    }
}
