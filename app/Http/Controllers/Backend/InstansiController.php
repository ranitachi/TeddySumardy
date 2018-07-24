<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\Instansi;
use App\Models\JenisInstansi;

class InstansiController extends Controller
{
    public function index()
    {
        $instansi = Instansi::with('jenis_instansi')->get();
        $jenis_instansi = JenisInstansi::all();

        return view('backend.pages.instansi.index')
            ->with('jenis_instansi', $jenis_instansi)
            ->with('instansi', $instansi);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_jenis_instansi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'lokasi' => 'required',
            'flag_active' => 'required',
        ])->validate();

        $insert = Instansi::create($request->all());

        return redirect()->route('instansi.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return Instansi::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'id_jenis_instansi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'lokasi' => 'required',
            'flag_active' => 'required',
        ])->validate();

        $update = Instansi::find($id)->update($request->all());

        return redirect()->route('instansi.index')
            ->with('success', 'Anda telah mengubah data instansi.');
    }

    public function destroy($id)
    {
        Instansi::destroy($id);

        return redirect()->route('instansi.index')
            ->with('success', 'Anda telah menghapus data instansi.');
    }
}
