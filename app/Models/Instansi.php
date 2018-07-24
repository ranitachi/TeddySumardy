<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instansi extends Model
{
    use SoftDeletes;

    protected $table = "instansi";

    protected $fillable = [ 'id_jenis_instansi', 'nama', 'alamat', 'no_telp', 'lokasi', 'flag_active' ];

    public function jenis_instansi()
    {
        return $this->belongsTo('App\Models\JenisInstansi', 'id_jenis_instansi');
    }
}
