<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumenUsulan extends Model
{
    use SoftDeletes;

    protected $table = "dokumen_usulan";

    protected $fillable = [ 
        'id_usulan_kerjasama', 'nama_dokumen', 'path'
    ];

    public function usulan_kerjasama()
    {
        return $this->belongsTo('App\Models\UsulanKerjasama', 'id_usulan_kerjasama');
    }
}
