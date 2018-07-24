<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Berita;

class ArtikelController extends Controller
{
    public function byslug($slug)
    {
        $data = Berita::where('slug', $slug)->first();

        return view('frontend.pages.artikel.index')->with('data', $data);
    }
}
