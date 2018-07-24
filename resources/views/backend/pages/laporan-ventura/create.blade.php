@extends('backend.layouts.master')

@section('title')
    <link rel="stylesheet" href="{{ asset('theme/backend') }}/libs/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <style>
        .datepicker {
            z-index: 99999;
        }
    </style>
@endsection

@section('alert-error')
	@if (Session::has('errors'))
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Oops, terjadi kesalahan. </strong>
				<ul style="font-size:12px;margin-top:5px;">
					@if ($errors->has('id_ventura'))
						<li> &nbsp; - {{ $errors->first('id_ventura') }}</li>
					@endif
					@if ($errors->has('id_client'))
						<li> &nbsp; - {{ $errors->first('id_client') }}</li>
					@endif
					@if ($errors->has('no_kontrak'))
						<li> &nbsp; - {{ $errors->first('no_kontrak') }}</li>
					@endif
					@if ($errors->has('tanggal_laporan'))
						<li> &nbsp; - {{ $errors->first('tanggal_laporan') }}</li>
					@endif
					@if ($errors->has('jenis_kontrak'))
						<li> &nbsp; - {{ $errors->first('jenis_kontrak') }}</li>
					@endif
					@if ($errors->has('nama_pekerjaan'))
						<li> &nbsp; - {{ $errors->first('nama_pekerjaan') }}</li>
					@endif
					@if ($errors->has('jenis_penugasan'))
						<li> &nbsp; - {{ $errors->first('jenis_penugasan') }}</li>
					@endif
					@if ($errors->has('lokasi_pekerjaan'))
						<li> &nbsp; - {{ $errors->first('lokasi_pekerjaan') }}</li>
					@endif
					@if ($errors->has('nilai_tanpa_pajak'))
						<li> &nbsp; - {{ $errors->first('nilai_tanpa_pajak') }}</li>
					@endif
					@if ($errors->has('nilai_dengan_pajak'))
						<li> &nbsp; - {{ $errors->first('nilai_dengan_pajak') }}</li>
					@endif
					@if ($errors->has('tanggal_mulai'))
						<li> &nbsp; - {{ $errors->first('tanggal_mulai') }}</li>
					@endif
					@if ($errors->has('tanggal_selesai'))
						<li> &nbsp; - {{ $errors->first('tanggal_selesai') }}</li>
					@endif
					@if ($errors->has('jumlah_dosen_terlibat'))
						<li> &nbsp; - {{ $errors->first('jumlah_dosen_terlibat') }}</li>
					@endif
					@if ($errors->has('jumlah_staf_lembaga_terlibat'))
						<li> &nbsp; - {{ $errors->first('jumlah_staf_lembaga_terlibat') }}</li>
					@endif
					@if ($errors->has('jumlah_konsultan_terlibat'))
						<li> &nbsp; - {{ $errors->first('jumlah_konsultan_terlibat') }}</li>
					@endif
				</ul>
			</div>
		</div>
    @endif
@endsection

@section('content')
	<div class="col-md-12">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Formulir Tambah Laporan Pekerjaan</span>
            </header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
                <form class="form-horizontal" action="{{ route('laporan-ventura.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Client</label>
                        <div class="col-sm-10">
                            <select name="id_client" class="form-control">
                                <option value="">-- Pilih Client --</option>
                                @foreach ($client as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Nomor Kontrak</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_kontrak">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Jenis Kontrak</label>
                        <div class="col-sm-10">
                            <select name="jenis_kontrak" class="form-control" id="jenis_kontrak">
                                <option value="">-- Pilih Jenis Kontrak --</option>
                                <option value="Penelitian">Penelitian</option>
                                <option value="Jasa Konsultansi">Jasa Konsultansi</option>
                                <option value="Pelatihan/Training">Pelatihan/Training</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="jumlah_peserta_training">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Jumlah Peserta Training</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jumlah_peserta_training">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Nama Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_pekerjaan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Jenis Penugasan</label>
                        <div class="col-sm-10">
                            <select name="jenis_penugasan" class="form-control">
                                <option value="">-- Pilih Jenis Penugasan --</option>
                                <option value="Internal">Internal</option>
                                <option value="Eksternal">Eksternal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Lokasi Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lokasi_pekerjaan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Nilai Tanpa Pajak</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control thousand" name="nilai_tanpa_pajak">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Nilai Dengan Pajak</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control thousand" name="nilai_dengan_pajak">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <div class="input-group date">
                                <input type="text" class="form-control" name="tanggal_mulai">
                                <span class="input-group-addon bg-info text-white">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <div class="input-group date">
                                <input type="text" class="form-control" name="tanggal_selesai">
                                <span class="input-group-addon bg-info text-white">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Jenis Pembayaran</label>
                        <div class="col-sm-10">
                            <select name="jenis_pembayaran" class="form-control">
                                <option value="">-- Pilih Jenis Pembayaran --</option>
                                <option value="1">Tanpa Termin</option>
                                <option value="2">Dengan Termin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Jumlah Keterlibatan Staf</label>
                        <div class="col-sm-10">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Staf Tetap/Dosen UI</td>
                                    <td>Pegawai Tetap Lembaga</td>
                                    <td>Konsultan Lepas</td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="jumlah_dosen_terlibat"></td>
                                    <td><input type="text" class="form-control" name="jumlah_staf_lembaga_terlibat"></td>
                                    <td><input type="text" class="form-control" name="jumlah_konsultan_terlibat"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Dokumen Pendukung</label>
                        <div class="col-sm-10">
                            <table class="table table-bordered" id="dokumen_pendukung">
                                <thead>
                                    <tr>
                                        <td style="width:15px;">#</td>
                                        <td>Nama Dokumen</td>
                                        <td>Upload File</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" class="form-control check"></td>
                                        <td><input type="text" class="form-control" name="nama_dokumen[]"></td>
                                        <td><input type="file" class="form-control" name="path[]"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <a style="cursor:pointer;" id="tambah_dokumen">
                                            <i class="fa fa-plus text-success"></i> &nbsp;Tambah Baris
                                        </a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a style="cursor:pointer;" id="hapus_dokumen">
                                            <i class="fa fa-minus text-danger"></i> &nbsp;Hapus Baris
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
@endsection

@section('footscript')
    <script src="{{ asset('theme/backend') }}/libs/bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}/js/jquery.formatCurrency-1.4.0.js"></script>

	<script>

        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#tambah_dokumen').click(function(){
            var html =  '<tr>' +
                            '<td><input type="checkbox" class="form-control check"></td>' +
                            '<td><input type="text" class="form-control" name="nama_dokumen[]"></td>' +
                            '<td><input type="file" class="form-control" name="path[]"></td>' +
                        '</tr>'

            $('#dokumen_pendukung > tbody:last-child').append(html).fadeIn()
        })

        $('#hapus_dokumen').click(function(){
            $('input:checkbox:checked').parents("tr").remove().fadeIn()
        })

        $('#jumlah_peserta_training').hide()
        $('#jenis_kontrak').change(function(){
            var value = $(this).val()
            if (value=="Pelatihan/Training") {
                $('#jumlah_peserta_training').show()
            } else {
                $('#jumlah_peserta_training').hide()
            }
        })

        $('.thousand').keyup(function(){
            $(this).formatCurrency({symbol:''})
        })
	</script>
@endsection