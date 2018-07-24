<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisInstansi extends Model
{
    use SoftDeletes;

    protected $table = "jenis_instansi";

    protected $fillable = [ 'nama' ];

    public function instansi()
    {
        return $this->hasMany('App\Models\Instansi');
    }
}
