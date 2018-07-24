<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusUsulan extends Model
{
    use SoftDeletes;

    protected $table = "status_usulan";

    protected $fillable = [ 'status' ];

    public function usulan_kerjasama()
    {
        return $this->hasMany('App\Models\UsulanKerjasama', 'id_status_usulan');
    }
}
