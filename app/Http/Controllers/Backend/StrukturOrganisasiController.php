<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile;
use Validator;
use Auth;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $data = Profile::where('type', 3)->first();

        return view('backend.pages.profile.struktur-organisasi.strukturorganisasi')
            ->with('data', $data);
    }

    public function create()
    {
        return view('backend.pages.profile.struktur-organisasi.form');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = new Profile;
        $insert->konten = $request->konten;
        $insert->type = 3; // struktur-organisasi
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('struktur-organisasi.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $data = Profile::where('type', 3)->first();

        return view('backend.pages.profile.struktur-organisasi.form')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = Profile::find($id);
        $insert->konten = $request->konten;
        $insert->type = 3; // struktur-organisasi
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('struktur-organisasi.index')
            ->with('success', 'Anda telah mengubah data.');
    }

    public function destroy($id)
    {
        Profile::destroy($id);

        return redirect()->route('struktur-organisasi.index')
            ->with('success', 'Anda telah menghapus data struktur organisasi.');
    }
}
