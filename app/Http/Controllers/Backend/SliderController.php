<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use Validator;
use Auth;
use File;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::paginate(12);

        return view('backend.pages.slider.index')->with('slider', $slider);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'file' => 'required|image|mimes:jpg,jpeg,png',
        ])->validate();

        DB::transaction(function() use($request) {
            $file = $request->file('file');
            $path = public_path().'/galeri/slider/';
            $filename = time()."_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
            $file->move($path, $filename);
            
            $insert = new Slider;
            $insert->judul = $request->judul;
            $insert->file = $filename;
            $insert->save();
        });
        
        return redirect()->route('slider.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return Slider::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
        ])->validate();

        DB::transaction(function() use($request, $id) {
            $update = Slider::find($id);
            $update->judul = $request->judul;
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = public_path().'/galeri/slider/';

                File::delete($path.$update->file);

                $filename = time()."_"."authorid".Auth::user()->id."_".strtolower($file->getClientOriginalName());
                $file->move($path, $filename);
                
                $update->file = $filename;
            }
            
            $update->save();
        });

        return redirect()->route('slider.index')
            ->with('success', 'Anda telah mengubah data slider.');
    }

    public function destroy($id)
    {
        $delete = Slider::find($id);
        
        DB::transaction(function() use($delete, $id){
            File::delete(public_path().'/galeri/slider/'.$delete->file);
            
            Slider::destroy($id);
        });

        return redirect()->route('slider.index')
            ->with('success', 'Anda telah menghapus data slider.');
    }
}
