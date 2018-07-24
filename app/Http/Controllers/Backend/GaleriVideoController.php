<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Galeri;
use Validator;
use Auth;
use DB;

class GaleriVideoController extends Controller
{
    public function index()
    {
        $galeri = Galeri::where('type', 2)->get();

        return view('backend.pages.galeri-video.index')->with('galeri', $galeri);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'url' => 'required',
        ])->validate();

        $insert = new Galeri;
        $insert->judul = $request->judul;
        $insert->url = $request->url;
        $insert->type = 2; // video
        $insert->save();

        return redirect()->route('galeri-video.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return Galeri::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'url' => 'required',
        ])->validate();

        $insert = Galeri::find($id);
        $insert->judul = $request->judul;
        $insert->url = $request->url;
        $insert->save();

        return redirect()->route('galeri-video.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function destroy($id)
    {
        Galeri::destroy($id);

        return redirect()->route('galeri-video.index')
            ->with('success', 'Anda telah menghapus data video.');
    }
}
