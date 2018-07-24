<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ventura extends Model
{
    use SoftDeletes;

    protected $table = "ventura";

    protected $fillable = [ 'nama', 'pimpinan', 'sejarah', 'visi_misi', 'deskripsi', 'web', 'flag', 'urut', 'slug' ];
}
