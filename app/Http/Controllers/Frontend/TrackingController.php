<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\UsulanKerjasama;
use App\Models\StatusUsulan;

class TrackingController extends Controller
{
    public function form()
    {
        return view('frontend.pages.tracking.form');
    }

    public function search(Request $request)
    {
        $usulan = UsulanKerjasama::where('id_tracking', $request->id_tracking)
            ->with('sifat_kerjasama')
            ->with('pivot_usulan')
            ->with('dokumen_usulan')
            ->first();

        $status = StatusUsulan::get();

        return view('frontend.pages.tracking.form')
            ->with('status', $status)
            ->with('usulan', $usulan);
    }

    public function download($filename)
    {
        return response()->download(storage_path('app/usulan/'.$filename));
    }
}
