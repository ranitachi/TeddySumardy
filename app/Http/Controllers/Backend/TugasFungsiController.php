<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile;
use Validator;
use Auth;

class TugasFungsiController extends Controller
{

    public function index()
    {
        $data = Profile::where('type', 2)->first();

        return view('backend.pages.profile.tugas-fungsi.tugasfungsi')
            ->with('data', $data);
    }

    public function create()
    {
        return view('backend.pages.profile.tugas-fungsi.form');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = new Profile;
        $insert->konten = $request->konten;
        $insert->type = 2; // tugas fungsi
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('tugas-fungsi.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $data = Profile::where('type', 2)->first();

        return view('backend.pages.profile.tugas-fungsi.form')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'konten' => 'required',
        ])->validate();

        $insert = Profile::find($id);
        $insert->konten = $request->konten;
        $insert->type = 2; // sejarah
        $insert->author_id = Auth::user()->id;
        $insert->save();

        return redirect()->route('tugas-fungsi.index')
            ->with('success', 'Anda telah mengubah data.');
    }

    public function destroy($id)
    {
        Profile::destroy($id);

        return redirect()->route('tugas-fungsi.index')
            ->with('success', 'Anda telah menghapus data tugas dan fungsi.');
    }
}
