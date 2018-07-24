<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client;
use App\Models\Ventura;
use App\Models\JenisInstansi;
use Validator;
use Auth;
use DB;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::where('id_ventura', Auth::user()->ventura->id)
            ->with('ventura')
            ->with('jenis_instansi')
            ->get();
        
        $jenis_instansi = JenisInstansi::all();
        
        return view('backend.pages.client.index')
            ->with('jenis_instansi', $jenis_instansi)
            ->with('client', $client);
    }

    public function getall()
    {
        $client = Client::with('ventura')
            ->with('jenis_instansi')
            ->get();
        
        $jenis_instansi = JenisInstansi::all();
        
        return view('backend.pages.client.index')
            ->with('jenis_instansi', $jenis_instansi)
            ->with('client', $client);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_jenis_instansi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ])->validate();

        $insert = new Client;
        $insert->id_ventura = Auth::user()->ventura->id;
        $insert->id_jenis_instansi = $request->id_jenis_instansi;
        $insert->nama = $request->nama;
        $insert->alamat = $request->alamat;
        $insert->telp = $request->telp;
        $insert->save();

        return redirect()->route('client.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return Client::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'id_jenis_instansi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ])->validate();

        $insert = Client::find($id);
        $insert->id_ventura = Auth::user()->ventura->id;
        $insert->id_jenis_instansi = $request->id_jenis_instansi;
        $insert->nama = $request->nama;
        $insert->alamat = $request->alamat;
        $insert->telp = $request->telp;
        $insert->save();

        return redirect()->route('client.index')
            ->with('success', 'Anda telah mengubah data baru.');
    }

    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->route('client.index')
            ->with('success', 'Anda telah menghapus data client.');
    }
}
