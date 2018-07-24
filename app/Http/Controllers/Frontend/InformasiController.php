<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KategoriBerita;
use App\Models\Berita;

class InformasiController extends Controller
{
    public function byslug($slug)
    {
        $berita = Berita::with('kategori')->get();

        $kategori = KategoriBerita::where('slug', $slug)->first();

        $show = [];
        foreach ($berita as $item) {
            if ($item->kategori->slug==$slug) {
                $show[] = $item;
            }
        }

        $data = collect($show);

        $all_kategori = KategoriBerita::all();

        return view('frontend.pages.informasi.bycategory')
            ->with('all_kategori', $all_kategori)
            ->with('kategori', $kategori->kategori)
            ->with('data', $data);
    }
}
