<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DokumenKerjasama;
use File;
use DB;

class DokumenKerjasamaController extends Controller
{
    public function delete($id)
    {
        $find = DokumenKerjasama::find($id);

        DB::transaction(function() use($find, $id){
            File::delete(storage_path().'/app/kerjasama/'.$find->path);
            DokumenKerjasama::destroy($id);
        });
    }
}
