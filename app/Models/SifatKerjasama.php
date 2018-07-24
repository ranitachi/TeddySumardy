<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SifatKerjasama extends Model
{
    use SoftDeletes;

    protected $table = "sifat_kerjasama";

    protected $fillable = [ 'sifat' ];

    public function kerjasama()
    {
        return $this->hasMany('App\Models\Kerjasama', 'id_sifat_kerjasama');
    }
}
