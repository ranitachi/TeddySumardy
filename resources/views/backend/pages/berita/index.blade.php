@extends('backend.layouts.master')

@section('modal')
	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Berita</h4>
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
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Data Seluruh Artikel</span>
				<a href="{{ route('berita.create') }}" class="btn btn-sm btn-success pull-right">+ Tambah Data</a>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								<th>Judul</th>
								<th>Kategori</th>
								<th>Tanggal Posting</th>
								<th>Jam Posting</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $key => $item)
								<tr>
									<td>{{ $key = $key + 1 }}</td>
									<td>{{ $item->judul }}</td>
									<td>{{ $item->kategori->kategori }}</td>
									<td>{{ date_format($item->updated_at, 'd-m-Y') }}</td>
									<td>{{ date_format($item->updated_at, 'H:i:s') }}</td>
									<td>
										@if ($item->flag==1)
											<span class="label bg-success">Aktif</span>
										@else
											<span class="label bg-danger">Non Aktif</span>
										@endif
										</td>
									<td>
										<a href="{{ route('berita.edit', $item->id) }}" class="btn btn-xs btn-warning btn-edit"><i class="fa fa-edit"></i></a>
										<a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $item->id }}"><i class="fa fa-trash"></i></a>
										<a href="#" class="btn btn-xs btn-primary"><i class="fa fa-arrow-right"></i></a>
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
		// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			
            $.ajax({
                url: "{{ url('backend/kategori-berita') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('backend/kategori-berita') }}/"+id)

					$('#kategori').val(res.kategori)
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/berita') }}/"+id)			
        })
	</script>
@endsection