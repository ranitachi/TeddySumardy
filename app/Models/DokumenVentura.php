<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumenVentura extends Model
{
    use SoftDeletes;

    protected $table = "dokumen_ventura";

    protected $fillable = [ 
        'id_ventura', 'nama_dokumen', 'path'
    ];

    public function ventura()
    {
        return $this->belongsTo('App\Models\Ventura', 'id_ventura');
    }
}
