<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function foto()
    {
        $data = Galeri::where('type', 1)->get();

        return view('frontend.pages.galeri.index')->with('data', $data);
    }

    public function video()
    {
        $data = Galeri::where('type', 2)->get();

        return view('frontend.pages.galeri.video')->with('data', $data);
    }
}
