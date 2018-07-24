<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile;
use Validator;
use Auth;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data = Profile::where('type', 4)->first();

        return view('backend.pages.profile.visi-misi.visimisi')
            ->with('data', $data);
    }

    public function create()
    {
        return view('backend.pages.profile.visi-misi.form');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = new Profile;
        $insert->konten = $request->konten;
        $insert->type = 4; // visi misi
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('visi-misi.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $data = Profile::where('type', 4)->first();

        return view('backend.pages.profile.visi-misi.form')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = Profile::find($id);
        $insert->konten = $request->konten;
        $insert->type = 4; // visi-misi
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('visi-misi.index')
            ->with('success', 'Anda telah mengubah data.');
    }

    public function destroy($id)
    {
        Profile::destroy($id);

        return redirect()->route('visi-misi.index')
            ->with('success', 'Anda telah menghapus data visi & misi.');
    }
}
