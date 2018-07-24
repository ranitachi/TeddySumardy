@extends('backend.layouts.master')

@section('alert-error')
	@if (Session::has('errors'))
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Oops, terjadi kesalahan. </strong>
				<ul style="font-size:12px;margin-top:5px;">
					@if ($errors->has('nama'))
						<li> &nbsp; - {{ $errors->first('nama') }}</li>
					@endif
					@if ($errors->has('pimpinan'))
						<li> &nbsp; - {{ $errors->first('pimpinan') }}</li>
					@endif
					@if ($errors->has('sejarah'))
						<li> &nbsp; - {{ $errors->first('sejarah') }}</li>
					@endif
					@if ($errors->has('visi_misi'))
						<li> &nbsp; - {{ $errors->first('visi_misi') }}</li>
					@endif
					@if ($errors->has('deskripsi'))
						<li> &nbsp; - {{ $errors->first('deskripsi') }}</li>
					@endif
					@if ($errors->has('web'))
						<li> &nbsp; - {{ $errors->first('web') }}</li>
					@endif
				</ul>
			</div>
		</div>
    @endif
@endsection

@section('modal')
	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Ventura</h4>
				</div>
				<div class="modal-body">
					<h5>Apakah anda yakin akan menghapus data ini?</h5>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form-delete').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
					<form id="form-delete" method="POST" style="display: none;">
						@csrf
						@method('DELETE')
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalsejarah" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Detail Konten</h4>
				</div>
				<div class="modal-body" id="konten">
					
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Tutup</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="col-md-12">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Data Ventura</span>
				<a href="{{ route('ventura.create') }}" class="btn btn-sm btn-success pull-right">+ Tambah Data</a>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								<th>Nama</th>
								<th>Pimpinan</th>
								<th>Sejarah</th>
								<th>Visi Misi</th>
								<th>Deskripsi</th>
								<th>Link Web</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $index => $v)
								<tr>
									<td>{{ $index = $index + 1 }}</td>
									<td>{{ $v->nama }}</td>
									<td>{{ $v->pimpinan }}</td>
									<td><a style="cursor:pointer;" class="btn-konten" data-toggle="modal" data-target="#modalsejarah" data-value="{{ $v->sejarah }}">Lihat</a></td>
									<td><a style="cursor:pointer;" class="btn-konten" data-toggle="modal" data-target="#modalsejarah" data-value="{{ $v->visi_misi }}">Lihat</a></td>
									<td><a style="cursor:pointer;" class="btn-konten" data-toggle="modal" data-target="#modalsejarah" data-value="{{ $v->deskripsi }}">Lihat</a></td>
									<td><a href="http://{{ $v->web }}" target="_blank">Kunjungi</a></td>
									<td>
										@if ($v->flag==1)
											<span class="label label-success">Aktif</span>
										@else
											<span class="label label-danger">Non Aktif</span>
										@endif
									</td>
									<td>
										<a href="{{ route('ventura.edit', $v->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $v->id }}"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div>
@endsection

@section('footscript')
	<script>
		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/ventura') }}/"+id)			
        })

		// open konten
        $('#table').on('click', '.btn-konten', function(){
            var data = $(this).data('value')
			$('#konten').html(data)
        })
	</script>
@endsection