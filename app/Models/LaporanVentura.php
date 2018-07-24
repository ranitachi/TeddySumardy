<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanVentura extends Model
{
    use SoftDeletes;

    protected $table = "laporan_ventura";

    protected $fillable = [ 
        'id_ventura', 'id_client', 'no_kontrak', 'tanggal_laporan', 
        'jenis_kontrak', 'nama_pekerjaan', 'jenis_penugasan', 'lokasi_pekerjaan', 
        'nilai_tanpa_pajak', 'nilai_dengan_pajak', 'realisasi', 'tanggal_mulai',
        'tanggal_selesai', 'jenis_pembayaran', 'jumlah_dosen_terlibat', 'jumlah_staf_lembaga_terlibat', 
        'jumlah_konsultan_terlibat', 'jumlah_peserta_training'
    ];

    public function ventura()
    {
        return $this->belongsTo('App\Models\Ventura', 'id_ventura');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'id_client');
    }

    public function dokumen_ventura()
    {
        return $this->hasMany('App\Models\DokumenVentura', 'id_ventura');
    }

    public function laporan_keuangan()
    {
        return $this->hasMany('App\Models\LaporanKeuangan', 'id_laporan_ventura');
    }
}
