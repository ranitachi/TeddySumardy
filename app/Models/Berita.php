<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes;

    protected $table = "berita";

    protected $fillable = [ 
        'id_kategori', 'id_author', 'judul', 'slug', 'foto_utama', 'konten', 'flag'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\KategoriBerita', 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_author');
    }
}
