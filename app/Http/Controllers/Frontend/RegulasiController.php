<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Regulasi;

class RegulasiController extends Controller
{
    public function index()
    {
        $data = Regulasi::all();

        return view('frontend.pages.regulasi.index')
            ->with('data', $data);
    }
}
