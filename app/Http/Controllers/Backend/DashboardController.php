<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KategoriBerita;
use App\Models\JenisInstansi;
use App\Models\LaporanVentura;
use App\Models\Kerjasama;
use App\Models\Instansi;
use App\Models\Regulasi;
use App\Models\Ventura;
use App\Models\Berita;
use App\Models\Client;
use App\Models\Galeri;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->level==1) {
            $berita = Berita::orderby('id', 'desc')->limit(5)->get();
            $kategori = KategoriBerita::all();
            $pengguna = User::count();
            $regulasi = Regulasi::count();
            $galeri = Galeri::count();

            $label = null;
            $arrlabel = [];
            $id_arr = [];
            foreach ($kategori as $value) {
                $label .= "'".$value->kategori."',";
                $id_arr[] = $value->id;
                $arrlabel[] = $value->kategori;
            }

            $value = null;
            $index = 0;
            foreach ($id_arr as $key) {
                $counter = 0;
                foreach ($berita as $ber) {
                    if ($key==$ber->id_kategori) {
                        $counter++;
                    }
                }
                $value .= "{value:".$counter.", name:'".$arrlabel[$index]."'},";
                $index++;
            }

            return view('backend.pages.dashboard.web')
                ->with('kategori', $kategori->count())
                ->with('label', $label)
                ->with('value', $value)
                ->with('galeri', $galeri)
                ->with('regulasi', $regulasi)
                ->with('pengguna', $pengguna)
                ->with('berita', $berita);
        }

        if (Auth::user()->level==2) {
            $kerjasama = Kerjasama::with('instansi')
            ->with('sifat_kerjasama')
            ->limit(8)
            ->get();

            $kerjasamacount = Kerjasama::count();

            $mitra = Instansi::count();
        
            $ks_berlangsung = 0;
            foreach ($kerjasama as $ks) {
                if (($ks->tanggal_mulai <= date('Y-m-d')) && ($ks->tanggal_selesai >= date('Y-m-d'))) {
                    $ks_berlangsung++;
                }
            }

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

            return view('backend.pages.dashboard.kerjasama')
                ->with('ji_label', $ji_label)
                ->with('ji_value', $ji_value)
                ->with('mitra', $mitra)
                ->with('kerjasamacount', $kerjasamacount)
                ->with('ks_berlangsung', $ks_berlangsung)
                ->with('kerjasama', $kerjasama);
        }

        if (Auth::user()->level==3) {
            $ventura = Ventura::all();
            $laporan = LaporanVentura::all();

            $laporanshow = LaporanVentura::with('ventura')->limit(5)->get();

            $berlangsung = 0;
            $belummulai = 0;
            $sudahselesai = 0;
            
            foreach ($laporan as $item) {
                if (($item->tanggal_mulai <= date('Y-m-d')) && ($item->tanggal_selesai >= date('Y-m-d'))) {
                    $berlangsung++;
                } else if(($item->tanggal_mulai >= date('Y-m-d'))) {
                    $belummulai++;
                } else if(($item->tanggal_selesai < date('Y-m-d'))) {
                    $sudahselesai++;
                }
            }

            return view('backend.pages.dashboard.ventura')
                ->with('berlangsung', $berlangsung)
                ->with('belummulai', $belummulai)
                ->with('sudahselesai', $sudahselesai)
                ->with('laporancount', $laporan->count())
                ->with('laporanshow', $laporanshow)
                ->with('venturacount', $ventura->count());       
        }

        if (Auth::user()->level==4) {
            $ventura = Ventura::all();
            $laporan = LaporanVentura::all();
            $kerjasamacount = Kerjasama::count();
            $kerjasama = Kerjasama::all();

            $laporanshow = LaporanVentura::with('ventura')->limit(5)->get();

            $v_berlangsung = 0;
            $v_belummulai = 0;
            $v_sudahselesai = 0;
            foreach ($laporan as $item) {
                if (($item->tanggal_mulai <= date('Y-m-d')) && ($item->tanggal_selesai >= date('Y-m-d'))) {
                    $v_berlangsung++;
                } else if(($item->tanggal_mulai >= date('Y-m-d'))) {
                    $v_belummulai++;
                } else if(($item->tanggal_selesai < date('Y-m-d'))) {
                    $v_sudahselesai++;
                }
            }

            $k_berlangsung = 0;
            $k_belummulai = 0;
            $k_sudahselesai = 0;
            foreach ($kerjasama as $item) {
                if (($item->tanggal_mulai <= date('Y-m-d')) && ($item->tanggal_selesai >= date('Y-m-d'))) {
                    $k_berlangsung++;
                } else if(($item->tanggal_mulai >= date('Y-m-d'))) {
                    $k_belummulai++;
                } else if(($item->tanggal_selesai < date('Y-m-d'))) {
                    $k_sudahselesai++;
                }
            }

            return view('backend.pages.dashboard.manajer')
                ->with('v_berlangsung', $v_berlangsung)
                ->with('v_belummulai', $v_belummulai)
                ->with('v_sudahselesai', $v_sudahselesai)
                ->with('k_berlangsung', $k_berlangsung)
                ->with('k_belummulai', $k_belummulai)
                ->with('k_sudahselesai', $k_sudahselesai)
                ->with('laporancount', $laporan->count())
                ->with('laporanshow', $laporanshow)
                ->with('kerjasamacount', $kerjasamacount)
                ->with('venturacount', $ventura->count());     
        }

        if (Auth::user()->level==5) {
            $laporan = LaporanVentura::where('id_ventura', Auth::user()->ventura->id)->get();

            $laporanshow = LaporanVentura::where('id_ventura', Auth::user()->ventura->id)
                ->with('ventura')->limit(5)->get();

            $client = Client::where('id_ventura', Auth::user()->ventura->id)->count();

            $berlangsung = 0;
            $belummulai = 0;
            $sudahselesai = 0;
            foreach ($laporan as $item) {
                if (($item->tanggal_mulai <= date('Y-m-d')) && ($item->tanggal_selesai >= date('Y-m-d'))) {
                    $berlangsung++;
                } else if(($item->tanggal_mulai >= date('Y-m-d'))) {
                    $belummulai++;
                } else if(($item->tanggal_selesai < date('Y-m-d'))) {
                    $sudahselesai++;
                }
            }

            return view('backend.pages.dashboard.kepala')
                ->with('client', $client)
                ->with('berlangsung', $berlangsung)
                ->with('belummulai', $belummulai)
                ->with('sudahselesai', $sudahselesai)
                ->with('laporancount', $laporan->count())
                ->with('laporanshow', $laporanshow);
        }
    }
}
