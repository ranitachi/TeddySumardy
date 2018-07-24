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
					@if ($errors->has('id_instansi'))
						<li> &nbsp; - {{ $errors->first('id_instansi') }}</li>
					@endif
					@if ($errors->has('kegiatan'))
						<li> &nbsp; - {{ $errors->first('kegiatan') }}</li>
					@endif
					@if ($errors->has('tanggal_mulai'))
						<li> &nbsp; - {{ $errors->first('tanggal_mulai') }}</li>
					@endif
					@if ($errors->has('tanggal_selesai'))
						<li> &nbsp; - {{ $errors->first('tanggal_selesai') }}</li>
					@endif
					@if ($errors->has('manfaat'))
						<li> &nbsp; - {{ $errors->first('manfaat') }}</li>
					@endif
					@if ($errors->has('keterangan'))
						<li> &nbsp; - {{ $errors->first('keterangan') }}</li>
					@endif
					@if ($errors->has('nama_dokumen'))
						<li> &nbsp; - {{ $errors->first('nama_dokumen') }}</li>
					@endif
					@if ($errors->has('path'))
						<li> &nbsp; - {{ $errors->first('path') }}</li>
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
				<span class="widget-title">Formulir Tambah Kerjasama</span>
            </header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
                <form class="form-horizontal" action="{{ route('kerjasama.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Nomor Naskah Kerjasama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_naskah">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Sifat Kerjasama</label>
                        <div class="col-sm-10">
                            <select name="id_sifat_kerjasama" class="form-control">
                                <option value="">-- Pilih Sifat Kerjasama --</option>
                                @foreach ($sifat as $data)
                                    <option value="{{ $data->id }}">{{  $data->sifat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Mitra Kerjasama</label>
                        <div class="col-sm-10">
                            <select name="id_instansi" class="form-control">
                                <option value="">-- Pilih Mitra Kerjasama --</option>
                                @foreach ($instansi as $data)
                                    <option value="{{ $data->id }}">{{  $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kegiatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Jenis Perjanjian</label>
                        <div class="col-sm-10">
                            <select name="jenis_perjanjian" class="form-control">
                                <option value="">-- Pilih Jenis Perjanjian --</option>
                                <option value="Kontrak Kerja">Kontrak Kerja</option>
                                <option value="NKB/MoU">NKB/MoU</option>
                                <option value="PKS/AoI">PKS/AoI</option>
                            </select>
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
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Manfaat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="30" rows="2" name="manfaat"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="30" rows="2" name="keterangan"></textarea>
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
	</script>
@endsection