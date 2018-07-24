<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $table = "client";

    protected $fillable = [ 
        'id_ventura', 'id_jenis_instansi', 'nama', 'alamat', 'telp', 'flag'
    ];

    public function ventura()
    {
        return $this->belongsTo('App\Models\Ventura', 'id_ventura');
    }

    public function jenis_instansi()
    {
        return $this->belongsTo('App\Models\JenisInstansi', 'id_jenis_instansi');
    }
}
