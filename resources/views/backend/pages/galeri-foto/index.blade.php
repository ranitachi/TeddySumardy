@extends('backend.layouts.master')

@section('modal')
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data Galeri Foto</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('galeri-foto.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<input name="judul" type="text" class="form-control" placeholder="Judul Foto">
						</div>
						<div class="form-group">
							<input name="file" type="file" class="form-control">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<input type="submit" class="btn btn-success" value="Simpan">
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Galeri Foto</h4>
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
@endsection

@section('content')
	<div class="col-md-12">
		<div class="mail-toolbar m-b-lg">								
			<div class="btn-group" role="group">
				<a href="#" class="btn btn-default">Galeri Foto</a>
			</div>

			<div class="btn-group" role="group">
				<a data-toggle="modal" data-target="#modaltambah"class="btn btn-default"><i class="fa fa-plus"></i></a>
			</div>
		</div>
	</div>

	<!-- Image Gallery -->
	<div class="gallery">

			@foreach ($galeri as $item)
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="gallery-item">
						<div class="thumb">
							<a href="{{ asset('galeri/foto') }}/{{ $item->file }}" data-lightbox="gallery-2" data-title="{{ $item->judul }}">
								<img class="img-responsive" src="{{ asset('galeri/foto') }}/{{ $item->file }}" style="height:160px;">
							</a>
						</div>
						<div class="caption">
							{{ $item->judul }}
							<a style="cursor:pointer;" class="pull-right btn-delete" data-value="{{ $item->id }}" data-toggle="modal" data-target="#modalhapus">
								<i class="fa fa-trash text-danger"></i>
							</a>
						</div>
					</div>
				</div>
			@endforeach
	</div><!-- END .gallery -->

	<div class="col-md-12">
		{{ $galeri->links() }}
	</div>

	@endsection

@section('footscript')
	<script>
		$('.btn-delete').click(function(){
			var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/galeri-foto') }}/"+id)			
        })
	</script>
@endsection
