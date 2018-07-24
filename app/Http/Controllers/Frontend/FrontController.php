<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Regulasi;

class FrontController extends Controller
{
    public function index()
    {
        $slider = Slider::orderby('id', 'desc')->get();

        $berita = Berita::with('kategori')
            ->with('user')
            ->where('flag', 1) // active
            ->orderby('id', 'desc')
            ->limit(2)
            ->get();

        $video = Galeri::where('type', 2)->latest()->first();

        $regulasi = Regulasi::limit(5)->get();

        return view('frontend.pages.home.index')
            ->with('regulasi', $regulasi)
            ->with('video', $video)
            ->with('berita', $berita)
            ->with('slider', $slider);
    }
}
