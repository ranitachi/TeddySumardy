<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function sejarah()
    {
        $data = Profile::where('type', 1)->first();

        return view('frontend.pages.profile.article')
            ->with('data', $data);
    }

    public function tugasfungsi()
    {
        $data = Profile::where('type', 2)->first();

        return view('frontend.pages.profile.article')
            ->with('data', $data);
    }

    public function strukturorg()
    {
        $data = Profile::where('type', 3)->first();

        return view('frontend.pages.profile.article')
            ->with('data', $data);
    }

    public function visimisi()
    {
        $data = Profile::where('type', 4)->first();

        return view('frontend.pages.profile.article')
            ->with('data', $data);
    }

    public function hubungi()
    {
        $data = Profile::where('type', 5)->first();

        return view('frontend.pages.profile.article')
            ->with('data', $data);
    }
}
