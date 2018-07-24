<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsulanKerjasama extends Model
{
    use SoftDeletes;

    protected $table = "usulan_kerjasama";

    protected $fillable = [ 
        'id_sifat_kerjasama', 'id_status_usulan', 'id_tracking', 'nama_pengusul', 'no_telp',
        'email', 'instansi', 'jenis_kegiatan', 'lokasi', 'file_naskah_kerjasama', 'manfaat' 
    ];

    public function sifat_kerjasama()
    {
        return $this->belongsTo('App\Models\SifatKerjasama', 'id_sifat_kerjasama');
    }

    public function pivot_usulan()
    {
        return $this->hasMany('App\Models\PivotUsulan', 'id_status');
    }

    public function status_usulan()
    {
        return $this->hasManyThrough('App\Models\StatusUsulan', 'App\Models\PivotUsulan', 'id_status', 'id');
    }

    public function dokumen_usulan()
    {
        return $this->hasMany('App\Models\DokumenUsulan', 'id_usulan_kerjasama');
    }
}
