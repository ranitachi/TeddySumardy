<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kerjasama extends Model
{
    use SoftDeletes;

    protected $table = "kerjasama";

    protected $fillable = [ 
        'no_naskah', 'id_instansi', 'id_sifat_kerjasama', 'jenis_perjanjian', 
        'kegiatan', 'tanggal_mulai', 'tanggal_selesai', 'status', 
        'manfaat', 'keterangan'
    ];

    public function instansi()
    {
        return $this->belongsTo('App\Models\Instansi', 'id_instansi');
    }

    public function dokumen_kerjasama()
    {
        return $this->hasMany('App\Models\DokumenKerjasama', 'id_kerjasama');
    }

    public function sifat_kerjasama()
    {
        return $this->belongsTo('App\Models\SifatKerjasama', 'id_sifat_kerjasama');
    }
}
