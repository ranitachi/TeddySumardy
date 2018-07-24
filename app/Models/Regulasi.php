<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regulasi extends Model
{
    use SoftDeletes;

    protected $table = "regulasi";

    protected $fillable = [ 
        'judul', 'file'
    ];
}
