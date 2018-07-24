@extends('backend.layouts.master')

@section('title')
    <link rel="stylesheet" href="{{ asset('theme/backend') }}/libs/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <style>
        .datepicker {
            z-index: 99999;
        }
    </style>
@endsection

@section('modal')
    <div class="modal fade" id="deletedokumen" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Dokumen Kerjasama</h4>
				</div>
				<div class="modal-body">
					<h5>Apakah anda yakin akan menghapus dokumen ini?</h5>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-danger" data-dismiss="modal" id="yakin" style="cursor:pointer;">Ya, Saya Yakin</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('alert-error')
	@if (Session::has('errors'))
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Oops, terjadi kesalahan. </strong>
				<ul style="font-size:12px;margin-top:5px;">
                    {{ $errors }}
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
				<span class="widget-title">Formulir Ubah Kerjasama</span>
            </header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
                <form class="form-horizontal" action="{{ route('kerjasama.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Nomor Naskah Kerjasama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_naskah" value={{ $data->no_naskah }}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Sifat Kerjasama</label>
                        <div class="col-sm-10">
                            <select name="id_sifat_kerjasama" class="form-control">
                                <option value="">-- Pilih Sifat Kerjasama --</option>
                                @foreach ($sifat as $sft)
                                    @if ($sft->id==$data->id_sifat_kerjasama)
                                        <option value="{{ $sft->id }}" selected>{{  $sft->sifat }}</option>
                                    @else
                                        <option value="{{ $sft->id }}">{{  $sft->sifat }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Mitra Kerjasama</label>
                        <div class="col-sm-10">
                            <select name="id_instansi" class="form-control">
                                @foreach ($instansi as $in)
                                    @if ($in->id==$data->id_instansi)
                                        <option value="{{ $in->id }}" selected>{{  $in->nama }}</option>
                                    @else
                                        <option value="{{ $in->id }}">{{  $in->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kegiatan" value="{{ $data->kegiatan }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Jenis Perjanjian</label>
                        <div class="col-sm-10">
                            <select name="jenis_perjanjian" class="form-control">
                                <option value="">-- Pilih Jenis Perjanjian --</option>
                                <option value="Kontrak Kerja" @if ($data->jenis_perjanjian=='Kontrak Kerja') {{ 'selected' }} @endif>Kontrak Kerja</option>
                                <option value="NKB/MoU" @if ($data->jenis_perjanjian=='NKB/MoU') {{ 'selected' }} @endif>NKB/MoU</option>
                                <option value="PKS/AoI" @if ($data->jenis_perjanjian=='PKS/AoI') {{ 'selected' }} @endif>PKS/AoI</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <div class="input-group date">
                                <input type="text" class="form-control" name="tanggal_mulai" value="{{ $data->tanggal_mulai }}">
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
                                <input type="text" class="form-control" name="tanggal_selesai" value="{{ $data->tanggal_selesai }}">
                                <span class="input-group-addon bg-info text-white">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Manfaat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="30" rows="2" name="manfaat">{{ $data->manfaat }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="30" rows="2" name="keterangan">{{ $data->keterangan }}</textarea>
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
                                        <td>Uploaded File</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->dokumen_kerjasama as $dk)
                                        <tr id="trid{{ $dk->id }}">
                                            <td><i class="fa fa-arrow-right text-primary"></i></td>
                                            <td>{{ $dk->nama_dokumen }}</td>
                                            <td>
                                                <a href="{{ route('kerjasama.download', $dk->path) }}" target="_blank">Download Dokumen</a>
                                                <a style="cursor:pointer;" data-value="{{ $dk->id }}" data-toggle="modal" data-target="#deletedokumen" class="pull-right delete-dokumen">
                                                    <i class="fa fa-close text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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

        $('.delete-dokumen').click(function(){
            var id = $(this).data('value')
            
            $('#yakin').data('value', id)
        })

        $('#yakin').click(function(){
            var id = $(this).data('value')

            $.ajax({
                url: "{{ url('/') }}/hapus-dokumen-kerjasama/"+id,
                success: function(){
                    $("#trid"+id).remove();
                }
            })
        })
	</script>
@endsection