@extends('backend.layouts.master')

@section('alert-error')
	@if (Session::has('errors'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Oops, terjadi kesalahan. </strong>
            <ul style="font-size:12px;margin-top:5px;">
                @if ($errors->has('nama'))
                    <li> &nbsp; - {{ $errors->first('nama') }}</li>
                @endif
                @if ($errors->has('alamat'))
                    <li> &nbsp; - {{ $errors->first('alamat') }}</li>
                @endif
                @if ($errors->has('no_telp'))
                    <li> &nbsp; - {{ $errors->first('no_telp') }}</li>
                @endif
                @if ($errors->has('id_jenis_instansi'))
                    <li> &nbsp; - {{ $errors->first('id_jenis_instansi') }}</li>
                @endif
                @if ($errors->has('lokasi'))
                    <li> &nbsp; - {{ $errors->first('lokasi') }}</li>
                @endif
                @if ($errors->has('flag_active'))
                    <li> &nbsp; - {{ $errors->first('flag_active') }}</li>
                @endif
            </ul>
        </div>
    @endif
@endsection

@section('modal')
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data Mitra Kerjasama</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('instansi.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<select name="id_jenis_instansi" class="form-control">
								<option value="">-- Pilih Tipe Mitra --</option>
								@foreach ($jenis_instansi as $data)
									<option value="{{ $data->id }}">{{ $data->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<input name="nama" type="text" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group">
							<textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<input name="no_telp" type="text" class="form-control" placeholder="Nomor Telepon">
						</div>
						<div class="form-group">
							<select name="lokasi" class="form-control">
								<option value="">-- Pilih Lokasi Mitra --</option>
								<option value="1">Dalam Negeri</option>
								<option value="2">Luar Negeri</option>
							</select>
						</div>
						<div class="form-group">
							<select name="flag_active" class="form-control">
								<option value="">-- Pilih Status --</option>
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
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

	<div class="modal fade" id="modalubah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Ubah Data Mitra Kerjasama</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
							<select name="id_jenis_instansi" class="form-control" id="id_jenis_instansi">
								<option value="">-- Pilih Tipe Mitra --</option>
								@foreach ($jenis_instansi as $data)
									<option value="{{ $data->id }}">{{ $data->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<input id="nama" name="nama" type="text" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group">
							<textarea id="alamat" name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<input id="no_telp" name="no_telp" type="text" class="form-control" placeholder="Nomor Telepon">
						</div>
						<div class="form-group">
							<select name="lokasi" class="form-control" id="lokasi">
								<option value="">-- Pilih Lokasi Mitra --</option>
								<option value="1">Dalam Negeri</option>
								<option value="2">Luar Negeri</option>
							</select>
						</div>
						<div class="form-group">
							<select name="flag_active" class="form-control" id="flag_active">
								<option value="">-- Pilih Status --</option>
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<input type="submit" class="btn btn-success" value="Simpan Perubahan">
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
					<h4 class="modal-title">Konfirmasi Hapus Data Mitra Kerjasama</h4>
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
				<span class="widget-title">Data Mitra Kerjasama</span>
				<a href="" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#modaltambah">+ Tambah Data</a>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th>Tipe Mitra Kerjasama</th>
								<th>Lokasi</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($instansi as $key => $data)
								<tr>
									<td>{{ $key = $key + 1 }}</td>
									<td>{{ $data->nama }}</td>
									<td>{{ $data->alamat }}</td>
									<td>{{ $data->no_telp }}</td>
									<td>{{ $data->jenis_instansi->nama }}</td>
									<td>
										@if ($data->lokasi==1)
											Dalam Negeri
										@else
											Luar Negeri
										@endif
									</td>
									@if ($data->flag_active==1)
										<td>
											<span class="label label-success" style="font-size:10px;">AKTIF</span>
										</td>
									@else
										<td>
											<span class="label label-danger" style="font-size:10px;">TIDAK AKTIF</span>
										</td>
									@endif

									<td>
										<a class="btn btn-xs btn-warning btn-edit" data-toggle="modal" data-target="#modalubah" data-value="{{ $data->id }}">
											<i class="fa fa-edit"></i>
										</a>
										<a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $data->id }}">
											<i class="fa fa-trash"></i>
										</a>
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
                url: "{{ url('backend/instansi') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('backend/instansi') }}/"+id)

					$('#nama').val(res.nama)
					$('#alamat').val(res.alamat)
					$('#no_telp').val(res.no_telp)
					$('#id_jenis_instansi').val(res.id_jenis_instansi)
					$('#lokasi').val(res.lokasi)
					$('#flag_active').val(res.flag_active)
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/instansi') }}/"+id)			
        })
	</script>
@endsection