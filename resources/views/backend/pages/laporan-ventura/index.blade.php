@extends('backend.layouts.master')

@section('modal')
	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Laporan</h4>
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
				<span class="widget-title">Data Laporan Pekerjaan & Keuangan</span>
				@if (Auth::user()->level==5)
					<a href="{{ route('laporan-ventura.create') }}" class="btn btn-sm btn-success pull-right">+ Tambah Data</a>
				@endif
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								@if (Auth::user()->level!=5)
									<th>Ventura</th>
								@endif
								<th>No Kontrak</th>
								<th>Pekerjaan</th>
								<th>Client</th>
								<th>Tanggal Laporan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($laporan as $key => $item)
								<tr>
									<td>{{ $key = $key + 1 }}</td>
									@if (Auth::user()->level!=5)
										<td>{{ $item->ventura->nama }}</td>
									@endif
									<td>{{ $item->no_kontrak }}</td>
									<td>{{ $item->nama_pekerjaan }}</td>
									<td>{{ $item->client->nama }}</td>
									<td>{{ $item->tanggal_laporan }}</td>
									<td>
										@if (($item->tanggal_mulai <= date('Y-m-d')) && ($item->tanggal_selesai >= date('Y-m-d')))
											<span class="label label-success" style="font-size:11px;">Sedang Berlangsung</span>
										@elseif(($item->tanggal_mulai >= date('Y-m-d')))
											<span class="label label-primary" style="font-size:11px;">Belum Dimulai</span>
										@elseif(($item->tanggal_selesai < date('Y-m-d')))
											<span class="label label-danger" style="font-size:11px;">Sudah Selesai</span>
										@endif
									</td>
									<td>
										<a href="{{ route('laporan-ventura.detail', $item->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-list"></i></a>
										@if (Auth::user()->level==5)
											<a href="{{ route('laporan-keuangan.show', $item->id) }}" class="btn btn-xs btn-success"><i class="fa fa-money"></i></a>
											<a href="{{ route('laporan-ventura.edit', $item->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
											<a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
										@endif
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
                url: "{{ url('backend/client') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('backend/client') }}/"+id)

					$('#id_jenis_instansi').val(res.id_jenis_instansi)
					$('#nama').val(res.nama)
					$('#alamat').val(res.alamat)
					$('#telp').val(res.telp)
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/client') }}/"+id)			
        })
	</script>
@endsection