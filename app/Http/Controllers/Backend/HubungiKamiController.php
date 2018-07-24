<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile;
use Validator;
use Auth;

class HubungiKamiController extends Controller
{
    public function index()
    {
        $data = Profile::where('type', 5)->first();

        return view('backend.pages.profile.hubungi.hubungi')
            ->with('data', $data);
    }

    public function create()
    {
        return view('backend.pages.profile.hubungi.form');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = new Profile;
        $insert->konten = $request->konten;
        $insert->type = 5; // hubungi
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('hubungi-kami.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $data = Profile::where('type', 5)->first();

        return view('backend.pages.profile.hubungi.form')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = Profile::find($id);
        $insert->konten = $request->konten;
        $insert->type = 5; // hubungi
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('hubungi-kami.index')
            ->with('success', 'Anda telah mengubah data.');
    }

    public function destroy($id)
    {
        Profile::destroy($id);

        return redirect()->route('hubungi-kami.index')
            ->with('success', 'Anda telah menghapus data hubungi kami.');
    }
}
