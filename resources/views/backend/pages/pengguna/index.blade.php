@extends('backend.layouts.master')

@section('modal')
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data Pengguna</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('pengguna.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<select name="level" class="form-control" id="level">
								<option value="">-- Pilih Level --</option>
								<option value="1">Administrator Web</option>
								<option value="2">Administrator Kerjasama</option>
								<option value="3">Administrator Ventura</option>
								<option value="4">Manajer Kerjasama & Ventura</option>
								<option value="5">Kepala Ventura</option>
								<option value="6">Pengusul Kerjasama</option>
							</select>
						</div>
						<div class="form-group" id="ventura">
							<select name="id_ventura" class="form-control">
								<option value="">-- Pilih Ventura --</option>
								@foreach ($ventura as $v)
									<option value="{{ $v->id }}">{{ $v->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<input name="name" type="text" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group">
							<input name="email" type="text" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input name="password" type="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password">
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
					<h4 class="modal-title">Ubah Data Pengguna</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
							<select name="level" class="form-control" id="level">
								<option value="">-- Pilih Level --</option>
								<option value="1">Administrator Web</option>
								<option value="2">Administrator Kerjasama</option>
								<option value="3">Administrator Ventura</option>
								<option value="4">Manajer Kerjasama & Ventura</option>
								<option value="5">Kepala Ventura</option>
								<option value="6">Pengusul Kerjasama</option>
							</select>
						</div>
						<div class="form-group">
							<input id="name" name="name" type="text" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group">
							<input id="email" name="email" type="text" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input id="password" name="password" type="password" class="form-control" placeholder="Password">
							<span class="help-block">* Silahkan kosongkan jika tidak mengubah password</span>
						</div>
						<div class="form-group">
							<input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password">
							<span class="help-block">* Silahkan kosongkan jika tidak mengubah password</span>							
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
					<h4 class="modal-title">Konfirmasi Hapus Data Pengguna</h4>
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
				<span class="widget-title">Data Pengguna</span>
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
								<th>Email</th>
								<th>Hak Akses</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $key => $user)
								<tr>
									<td>{{ $key = $key + 1 }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									
									@switch($user->level)
										@case(1)
											<td>Administrator Website</td>
											@break
										@case(2)
											<td>Administrator Kerjasama</td>
											@break
										@case(3)
											<td>Administrator Ventura</td>
											@break
										@case(4)
											<td>Manajer Kerjasama & Ventura</td>
											@break
										@case(5)
											<td>Kepala Ventura</td>
											@break
										@case(6)
											<td>Pengusul Kerjasama</td>
											@break
										@default
											
									@endswitch
									
									<td>
										<a class="btn btn-xs btn-warning btn-edit" data-toggle="modal" data-target="#modalubah" data-value="{{ $user->id }}">
											<i class="fa fa-edit"></i>
										</a>
										<a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $user->id }}">
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
		$('#ventura').hide()

		// select level change
		$('#level').change(function(){
			var value = $(this).val()
			if (value==5) {
				$('#ventura').show()
			}
		})

		// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			
            $.ajax({
                url: "{{ url('backend/pengguna') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('backend/pengguna') }}/"+id)

					$('#name').val(res.name)
					$('#email').val(res.email)
					$('#password').val(res.password)
					$('#password_confirmation').val(res.password)
					$('#level').val(res.level)
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/pengguna') }}/"+id)			
        })
	</script>
@endsection