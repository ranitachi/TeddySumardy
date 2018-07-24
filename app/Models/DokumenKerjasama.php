<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumenKerjasama extends Model
{
    use SoftDeletes;

    protected $table = "dokumen_kerjasama";

    protected $fillable = [ 
        'id_kerjasama', 'nama_dokumen', 'path'
    ];

    public function kerjasama()
    {
        return $this->belongsTo('App\Models\Kerjasama', 'id_kerjasama');
    }
}
