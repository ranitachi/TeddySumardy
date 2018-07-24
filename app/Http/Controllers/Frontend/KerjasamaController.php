<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kerjasama;
use App\Models\Instansi;

class KerjasamaController extends Controller
{
    public function daftar()
    {
        $kerjasama = Kerjasama::with('instansi')->with('sifat_kerjasama')->orderby('id', 'desc')->get();

        return view('frontend.pages.kerjasama.daftar')
            ->with('kerjasama', $kerjasama);
    }

    public function rekap()
    {
        // belom dikoding..

        return view('frontend.pages.kerjasama.rekap');
    }

    public function mitra()
    {
        $instansi = Instansi::with('jenis_instansi')->get();

        return view('frontend.pages.kerjasama.mitra')->with('mitra', $instansi);
    }
}
