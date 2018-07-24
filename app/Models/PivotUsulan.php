<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PivotUsulan extends Model
{
    protected $table = "pivot_usulan";

    protected $fillable = [ 
        'id_usulan', 'id_status', 'tanggal'
    ];

    public function usulan_kerjasama()
    {
        return $this->belongsTo('App\Models\UsulanKerjasama', 'id_usulan');
    }

    public function status_usulan()
    {
        return $this->belongsTo('App\Models\StatusUsulan', 'id_status');
    }
}
