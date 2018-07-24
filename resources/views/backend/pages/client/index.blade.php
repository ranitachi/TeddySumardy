@extends('backend.layouts.master')

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
					@if ($errors->has('id_jenis_instansi'))
						<li> &nbsp; - {{ $errors->first('id_jenis_instansi') }}</li>
					@endif
					@if ($errors->has('nama'))
						<li> &nbsp; - {{ $errors->first('nama') }}</li>
					@endif
					@if ($errors->has('alamat'))
						<li> &nbsp; - {{ $errors->first('alamat') }}</li>
					@endif
					@if ($errors->has('telp'))
						<li> &nbsp; - {{ $errors->first('telp') }}</li>
					@endif
				</ul>
			</div>
		</div>
    @endif
@endsection

@section('modal')
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data Client</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('client.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<select name="id_jenis_instansi" class="form-control">
                                <option value="">-- Pilih Jenis Instansi --</option>
                                @foreach ($jenis_instansi as $ji)
                                    <option value="{{ $ji->id }}">{{ $ji->nama }}</option>
                                @endforeach
                            </select>
						</div>
						<div class="form-group">
							<input name="nama" type="text" class="form-control" placeholder="Nama Client">
						</div>
						<div class="form-group">
							<textarea name="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat Client"></textarea>
						</div>
						<div class="form-group">
							<input name="telp" type="text" class="form-control" placeholder="Telepon Client">
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
					<h4 class="modal-title">Ubah Data Client</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
							<select name="id_jenis_instansi" class="form-control" id="id_jenis_instansi">
                                <option value="">-- Pilih Jenis client --</option>
                                @foreach ($jenis_instansi as $ji)
                                    <option value="{{ $ji->id }}">{{ $ji->nama }}</option>
                                @endforeach
                            </select>
						</div>
						<div class="form-group">
							<input name="nama" type="text" class="form-control" placeholder="Nama Client" id="nama">
						</div>
						<div class="form-group">
							<textarea name="alamat" cols="30" rows="10" class="form-control" id="alamat"></textarea>
						</div>
						<div class="form-group">
							<input name="telp" type="text" class="form-control" placeholder="Telepon Client" id="telp">
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
					<h4 class="modal-title">Konfirmasi Hapus Data Client</h4>
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
				<span class="widget-title">Data Client</span>
				@if (Auth::user()->level==5)
					<a href="" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#modaltambah">+ Tambah Data</a>
				@endif
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								@if (Auth::user()->level==3)
									<th>Ventura</th>
								@endif
								<th>Nama Client</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Jenis Instansi</th>
								@if (Auth::user()->level==5)
									<th>Aksi</th>
								@endif
							</tr>
						</thead>
						<tbody>
                            @foreach ($client as $index => $item)
                                <tr>
									<td>{{ $index = $index + 1 }}</td>
									@if (Auth::user()->level==3)
										<td>{{ $item->ventura->nama }}</td>
									@endif
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->telp }}</td>
									<td>{{ $item->jenis_instansi->nama }}</td>
									@if (Auth::user()->level==5)
										<td>
											<a href="" class="btn btn-xs btn-warning btn-edit" data-value="{{ $item->id }}" data-toggle="modal" data-target="#modalubah"><i class="fa fa-edit"></i></a>
											<a href="" class="btn btn-xs btn-danger btn-delete" data-value="{{ $item->id }}" data-toggle="modal" data-target="#modalhapus"><i class="fa fa-trash"></i></a>
										</td>
									@endif
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