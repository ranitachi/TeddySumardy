<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DokumenVentura;
use File;
use DB;

class DokumenVenturaController extends Controller
{
    public function delete($id)
    {
        $find = DokumenVentura::find($id);

        DB::transaction(function() use($find, $id){
            File::delete(storage_path().'/app/ventura/'.$find->path);
            DokumenVentura::destroy($id);
        });
    }
}
