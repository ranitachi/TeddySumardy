<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SifatKerjasama;

class UsulanKerjasamaController extends Controller
{
    public function create()
    {
        $sifat = SifatKerjasama::all();

        return view('frontend.pages.usulan_kerjasama.create')
            ->with('sifat', $sifat);
    }
}
