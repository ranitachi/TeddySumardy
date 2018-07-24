@extends('backend.layouts.master')

@section('modal')
	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Kerjasama</h4>
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

	<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Detail Data Kerjasama</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<span style="font-size:12px">Detail Data:</span> 
							<table class="table" style="margin-top:10px;">
								<tr>
									<td style="width:130px;">No. Naskah</td>
									<td id="no_naskah">: </td>
								</tr>
								<tr>
									<td>Mitra Kerjasama</td>
									<td id="id_instansi">: </td>
								</tr>
								<tr>
									<td>Sifat Kerjasama</td>
									<td id="id_sifat_kerjasama">: </td>
								</tr>
								<tr>
									<td>Kegiatan</td>
									<td id="kegiatan">: </td>
								</tr>
								<tr>
									<td>Jenis Perjanjian</td>
									<td id="jenis_perjanjian">: </td>
								</tr>
								<tr>
									<td>Tanggal Mulai</td>
									<td id="tanggal_mulai">: </td>
								</tr>
								<tr>
									<td>Tanggal Selesai</td>
									<td id="tanggal_selesai">: </td>
								</tr>
								<tr>
									<td>Manfaat</td>
									<td id="manfaat">: </td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td id="keterangan">: </td>
								</tr>
								<tr>
									<td>Status</td>
									<td id="status">: </td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<span style="font-size:12px">Dokumen Pendukung:</span> 
							<table id="dokumen_pendukung" class="table table-bordered" style="margin-top:10px;">
								<thead>
									<tr>
										<th style="font-size:12px">#</th>
										<th style="font-size:12px">Nama</th>
										<th style="font-size:12px">Dokumen</th>
									</tr>
								</thead>
								<tbody id="tbodydoc"></tbody>
							</table>
						</div>
					</div>
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
				<span class="widget-title">Data Kerjasama</span>
				@if (Auth::user()->level==2)
					<a href="{{ route('kerjasama.create') }}" class="btn btn-sm btn-success pull-right">+ Tambah Data</a>
				@endif
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								<th>No Naskah</th>
								<th>Kegiatan</th>
								<th>Jenis</th>
								<th>Mitra</th>
								<th>Manfaat</th>
								<th>Keterangan</th>
								<th>Status Kerjasama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($kerjasama as $key => $data)
								<tr>
									<td>{{ $key = $key + 1 }}</td>
									<td>{{ $data->no_naskah }}</td>
									<td>{{ $data->kegiatan }}</td>
									<td>{{ $data->jenis_perjanjian }}</td>
									<td>{{ $data->instansi->nama }}</td>
									<td>{{ $data->manfaat }}</td>
									<td>{{ $data->keterangan }}</td>
									<td>
										@if (($data->tanggal_mulai <= date('Y-m-d')) && ($data->tanggal_selesai >= date('Y-m-d')))
											<span class="label label-success" style="font-size:11px;">Sedang Berlangsung</span>
										@elseif(($data->tanggal_mulai >= date('Y-m-d')))
											<span class="label label-primary" style="font-size:11px;">Belum Dimulai</span>
										@elseif(($data->tanggal_selesai < date('Y-m-d')))
											<span class="label label-danger" style="font-size:11px;">Sudah Selesai</span>
										@endif
									</td>
									<td style="display: flex;">
										<a href="#" data-toggle="modal" data-target="#modaldetail" class="btn btn-xs btn-primary btn-detail" data-value="{{ $data->id }}">
											<i class="fa fa-list"></i>
										</a>&nbsp;
										@if (Auth::user()->level==2)
											<a href="{{ route('kerjasama.edit', $data->id) }}" class="btn btn-xs btn-warning btn-edit">
												<i class="fa fa-edit"></i>
											</a>&nbsp;
											<a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $data->id }}">
												<i class="fa fa-trash"></i>
											</a>
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
		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/kerjasama') }}/"+id)			
        })

		$('#table').on('click', '.btn-detail', function(){
            var id = $(this).data('value')
			
			$.ajax({
				url: "{{ url('/') }}/detail-kerjasama/"+id,
				success: function(res){
					$('#no_naskah').html(": &nbsp;&nbsp;"+res.no_naskah)
					$('#id_instansi').html(": &nbsp;&nbsp;"+res.instansi.nama)
					$('#id_sifat_kerjasama').html(": &nbsp;&nbsp;"+res.sifat_kerjasama.sifat)
					$('#kegiatan').html(": &nbsp;&nbsp;"+res.kegiatan)
					$('#jenis_perjanjian').html(": &nbsp;&nbsp;"+res.jenis_perjanjian)
					$('#tanggal_mulai').html(": &nbsp;&nbsp;"+res.tanggal_mulai)
					$('#tanggal_selesai').html(": &nbsp;&nbsp;"+res.tanggal_selesai)
					$('#manfaat').html(": &nbsp;&nbsp;"+res.manfaat)
					$('#keterangan').html(": &nbsp;&nbsp;"+res.keterangan)

					var today = new Date();
					var mulai = new Date(res.tanggal_mulai)
					var selesai = new Date(res.tanggal_selesai)

					if (today < mulai) {
						$('#status').html(": &nbsp;&nbsp;<span class='label label-primary'>Belum Dimulai</span>")
					} else if (today < selesai) {
						$('#status').html(": &nbsp;&nbsp;<span class='label label-success'>Sedang Berlangsung</span>")
					} else if (today > selesai) {
						$('#status').html(": &nbsp;&nbsp;<span class='label label-danger'>Sudah Selesai</span>")						
					}

					var html = '';
					var number = 1;
					res.dokumen_kerjasama.forEach(function(item){
						var route_download = "{{ url('/') }}/backend/kerjasama/download-dokumen/"+item.path;
						html +=  '<tr>' +
									'<td>'+number+'</td>' +
									'<td>'+item.nama_dokumen+'</td>' +
									'<td>'+
										"<a href='"+route_download+"'>Download Dokumen</a>"+
									'</td>'+
								'</tr>'
						number++;
					})

					$('#tbodydoc').empty()
            		$('#dokumen_pendukung > tbody:last-child').append(html).fadeIn()
				}
			})
        })
	</script>
@endsection