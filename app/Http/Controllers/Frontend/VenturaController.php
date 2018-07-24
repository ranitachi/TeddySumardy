<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Ventura;

class VenturaController extends Controller
{
    public function byslug($slug)
    {
        $data = Ventura::where('slug', $slug)->first();

        return view('frontend.pages.ventura.index')
            ->with('data', $data);
    }

    public function daftar()
    {
        $data = Ventura::all();

        return view('frontend.pages.ventura.daftar')
            ->with('data', $data);
    }
}
