<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanKeuangan extends Model
{
    use SoftDeletes;

    protected $table = "laporan_keuangan";

    protected $fillable = [ 
        'id_laporan_ventura', 'tanggal_pembayaran', 'termin', 'nilai_termin', 'nilai_kontribusi'
    ];
}
