<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\FrontController@index')->name('frontend.index');

Route::get('/dashboard', 'Backend\DashboardController@index')->name('backend.dashboard')->middleware('auth');

Route::resource('/backend/sejarah', 'Backend\SejarahController')->middleware('isWebAdmin');

Route::resource('/backend/tugas-fungsi', 'Backend\TugasFungsiController')->middleware('isWebAdmin');

Route::resource('/backend/struktur-organisasi', 'Backend\StrukturOrganisasiController')->middleware('isWebAdmin');

Route::resource('/backend/visi-misi', 'Backend\VisiMisiController')->middleware('isWebAdmin');

Route::resource('/backend/hubungi-kami', 'Backend\HubungiKamiController')->middleware('isWebAdmin');

Route::resource('/backend/ventura', 'Backend\VenturaController');

Route::resource('/backend/laporan-ventura', 'Backend\LaporanVenturaController')->middleware('isKepalaVentura');

Route::get('/backend/all/laporan-ventura', 'Backend\LaporanVenturaController@getall')->name('laporan-ventura.all');

Route::get('/backend/laporan-ventura/detail/{id}', 'Backend\LaporanVenturaController@detail')->name('laporan-ventura.detail');

Route::resource('/backend/kategori-berita', 'Backend\KategoriBeritaController')->middleware('isWebAdmin');

Route::resource('/backend/berita', 'Backend\BeritaController')->middleware('isWebAdmin');

Route::resource('/backend/galeri-foto', 'Backend\GaleriFotoController')->middleware('isWebAdmin');

Route::resource('/backend/galeri-video', 'Backend\GaleriVideoController')->middleware('isWebAdmin');

Route::resource('/backend/slider', 'Backend\SliderController')->middleware('isWebAdmin');

Route::resource('/backend/jenis-instansi', 'Backend\JenisInstansiController')->middleware('isAdminKerjasama');

Route::resource('/backend/sifat-kerjasama', 'Backend\SifatKerjasamaController')->middleware('isAdminKerjasama');

Route::resource('/backend/instansi', 'Backend\InstansiController')->middleware('isAdminKerjasama');

Route::resource('/backend/kerjasama', 'Backend\KerjasamaController');

Route::get('detail-kerjasama/{id}', 'Backend\KerjasamaController@detail');

Route::get('/backend/kerjasama/download-dokumen/{filename}', 'Backend\KerjasamaController@download')->name('kerjasama.download');

Route::get('hapus-dokumen-kerjasama/{id}', 'Backend\DokumenKerjasamaController@delete')->name('dokumen-kerjasama.destroy');

Route::get('hapus-dokumen-ventura/{id}', 'Backend\DokumenVenturaController@delete')->name('dokumen-ventura.destroy');

Route::resource('/backend/regulasi', 'Backend\RegulasiController')->middleware('isWebAdmin');

Route::resource('/backend/pengguna', 'Backend\PenggunaController')->middleware('isWebAdmin');

Route::get('/backend/rekapitulasi-kerjasama', 'Backend\RekapitulasiKerjasamaController@chart')->name('rekap-kerjasama.index');

Route::resource('/backend/client', 'Backend\ClientController')->middleware('isKepalaVentura');

Route::get('/backend/admin/client', 'Backend\ClientController@getall')->name('client.all');

Route::resource('/backend/laporan-keuangan', 'Backend\LaporanKeuanganController');

Route::resource('/backend/status-usulan', 'Backend\StatusUsulanController')->middleware('isAdminKerjasama');

Route::post('kontribusi-ui/store/{id}', 'Backend\LaporanKeuanganController@kontribusi')->name('kontribusi-ui.store');

Route::get('/profile/sejarah', 'Frontend\ProfileController@sejarah')->name('front.sejarah');

Route::get('/profile/tugas-fungsi', 'Frontend\ProfileController@tugasfungsi')->name('front.tugas');

Route::get('/profile/struktur-organisasi', 'Frontend\ProfileController@strukturorg')->name('front.struktur');

Route::get('/profile/visi-misi', 'Frontend\ProfileController@visimisi')->name('front.visi');

Route::get('/profile/hubungi-kami', 'Frontend\ProfileController@hubungi')->name('front.hubungi');

Route::get('/kerjasama/daftar', 'Frontend\KerjasamaController@daftar')->name('kerjasama.daftar');

Route::get('/kerjasama/rekapitulasi', 'Frontend\KerjasamaController@rekap')->name('kerjasama.rekap');

Route::get('/kerjasama/mitra', 'Frontend\KerjasamaController@mitra')->name('kerjasama.mitra');

Route::get('/informasi/{slug}', 'Frontend\InformasiController@byslug')->name('informasi.berita');

Route::get('/ventura/{slug}', 'Frontend\VenturaController@byslug')->name('ventura.slug');

Route::get('/all/ventura', 'Frontend\VenturaController@daftar')->name('ventura.all');

Route::get('/galeri/kumpulan-foto', 'Frontend\GaleriController@foto')->name('galeri.foto');

Route::get('/galeri/kumpulan-video', 'Frontend\GaleriController@video')->name('galeri.video');

Route::get('/regulasi/download', 'Frontend\RegulasiController@index')->name('front.regulasi');

Route::get('/artikel/{slug}', 'Frontend\ArtikelController@byslug')->name('artikel.slug');

Route::get('/kerjasama/usulan', 'Frontend\UsulanKerjasamaController@create')->name('kerjasama.ajukan');

Route::post('/kerjasama/usulan', 'Backend\UsulanKerjasamaController@store')->name('usulan.store');

Route::get('/kerjasama/tracking', 'Frontend\TrackingController@form')->name('kerjasama.tracking');

Route::post('/kerjasama/tracking/search', 'Frontend\TrackingController@search')->name('kerjasama.search');

Route::get('/asdf/{filename}', 'Frontend\TrackingController@download')->name('usulan.download');

Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});