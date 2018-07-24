@extends('backend.layouts.master')

@section('modal')
    @if (!is_null($data))
        <div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Konfirmasi Hapus Data Jenis Instansi</h4>
                    </div>
                    <div class="modal-body">
                        <h5>Apakah anda yakin akan menghapus data ini?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                        <a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form-delete').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
                        <form id="form-delete" action="{{ route('sejarah.destroy', $data->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Sejarah</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="user-card p-md">
					<div class="media">
                        <div class="media-body">
                            @if (!is_null($data)) 
                                <a href="{{ route('sejarah.edit', $data->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> &nbsp;Ganti Data</a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modalhapus" data-value="{{ $data->id }}"><i class="fa fa-edit"></i> &nbsp;Hapus Data</a>
                                
                            @else
                                <a href="{{ route('sejarah.create') }}" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;Input Data</a>
                            @endif
						</div>
					</div>
                </div>
                
                @if (is_null($data))
                    <p>
                        <i class="text-muted">Belum ada konten.</i>
                    </p>
                @else
                    {!! $data->konten !!}
                @endif

            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
@endsection