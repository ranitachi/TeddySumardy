<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\JenisInstansi;
use App\Models\Instansi;
use App\Models\Kerjasama;

class RekapitulasiKerjasamaController extends Controller
{
    public function chart()
    {
        // tipe mitra chart
        $jenis_instansi = JenisInstansi::all();
        $kerjasama = Kerjasama::with('instansi')->get();

        $ji_label = null;
        $ji_value = null;
        if (!is_null($jenis_instansi)) {
            foreach ($jenis_instansi as $ji) {
                $ji_label .= "'".$ji->nama."',";
                $count_ks = 0;
                foreach ($kerjasama as $ks) {
                    if ($ji->id==$ks->instansi->id_jenis_instansi) {
                        $count_ks++;
                    }
                }
                $ji_value .= "{value:".$count_ks.", name:'".$ji->nama."'},";
            }
        }
        
        // lokasi mitra chart
        $lm_label = "'Dalam Negeri', 'Luar Negeri'";
        $lm_arr_name = ['Dalam Negeri', 'Luar Negeri'];
        $lm_array = [1,2];
        $lm_value = null;
        $lm_index = 0;

        foreach ($lm_array as $lm) {
            $count_ks = 0;
            foreach ($kerjasama as $ks) {
                if ($lm==$ks->instansi->lokasi) {
                    $count_ks++;
                }
            }
            $lm_value .= "{value:".$count_ks.", name:'".$lm_arr_name[$lm_index]."'},";
            $lm_index++;
        }

        // lokasi jenis kerjasama
        $jk_label = "'Kontrak Kerja', 'NKB/MoU', 'PKS/AoI'";
        $jk_arr_name = ['Kontrak Kerja', 'NKB/MoU', 'PKS/AoI'];
        $jk_value = null;
        $jk_index = 0;

        foreach ($jk_arr_name as $jk) {
            $count_ks = 0;
            foreach ($kerjasama as $ks) {
                if ($jk==$ks->jenis_perjanjian) {
                    $count_ks++;
                }
            }
            $jk_value .= "{value:".$count_ks.", name:'".$jk_arr_name[$jk_index]."'},";
            $jk_index++;
        }

        // lokasi sifat kerjasama
        $sk_label = "'Akademik', 'Non Akademik'";
        $sk_arr_name = ['Akademik', 'Non Akademik'];
        $sk_array = [1,2];
        $sk_value = null;
        $sk_index = 0;

        foreach ($sk_array as $sk) {
            $count_ks = 0;
            foreach ($kerjasama as $ks) {
                if ($sk==$ks->id_sifat_kerjasama) {
                    $count_ks++;
                }
            }
            $sk_value .= "{value:".$count_ks.", name:'".$sk_arr_name[$sk_index]."'},";
            $sk_index++;
        }

        return view('backend.pages.rekap-kerjasama.index')
            ->with('sk_value', $sk_value)
            ->with('sk_label', $sk_label)
            ->with('jk_value', $jk_value)
            ->with('jk_label', $jk_label)
            ->with('lm_value', $lm_value)
            ->with('lm_label', $lm_label)
            ->with('ji_value', $ji_value)
            ->with('ji_label', $ji_label);
    }
}
