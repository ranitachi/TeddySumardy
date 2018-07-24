<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = "profile";

    protected $fillable = [ 
        'konten', 'type', 'author_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
