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
	<div class="modal fade" id="modalkontribusi" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Input Data Kontribusi UI</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="formkontribusi">
                        @csrf
                        <div class="form-group">
							<input name="kontribusi" type="text" class="form-control" placeholder="Nilai Kontribusi UI">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<input type="submit" value="Simpan" class="btn btn-success">
                </div>
                </form>                
			</div>
		</div>
	</div>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="promo-footer" style="background:#fff;">
            <div class="row no-gutter">
                <div class="col-sm-4 promo-tab">
                    <div class="text-right">
                        <small style="margin-right:30px;">Nama Pekerjaan</small>
                        <div style="margin-top:5px;margin-right:30px;">
                            <h4 class="m-0 m-t-xs">{{ $ventura->nama_pekerjaan }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 promo-tab">
                    <div class="text-center">
                        <small>Nilai Pekerjaan Dengan Pajak</small>
                        <h4 class="m-0 m-t-xs">Rp {{ number_format($ventura->nilai_dengan_pajak) }},-</h4>
                    </div>
                </div>
                <div class="col-sm-4 promo-tab">
                    <div class="text-left" style="margin-left:30px;">
                        <small>Nomor Kontrak Pekerjaan</small>
                        <h4 class="m-0 m-t-xs">{{ $ventura->no_kontrak }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5" style="margin-top:20px;">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Formulir Realisasi Pembayaran</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="{{ route('laporan-keuangan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_laporan_ventura" value="{{ $ventura->id }}">
                    @if ($ventura->jenis_pembayaran==2)
                        <div class="form-group">
                            <label>Termin Ke</label>
                            <input type="text" class="form-control" readonly 
                                @if (!($presentase>=100))
                                    value="{{ $termin_ke }}" 
                                @else
                                    disabled
                                @endif
                            name="termin">
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Tanggal Pembayaran</label>
                        <div class="input-group date">
                            <input type="text" class="form-control" name="tanggal_pembayaran"
                                @if ($presentase>=100)
                                    disabled
                                @endif
                            >
                            <span class="input-group-addon bg-info text-white">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nilai Pembayaran</label>
                        <input type="text" class="form-control" name="nilai_termin"
                            @if ($presentase>=100)
                                disabled
                            @endif
                        >
                    </div>
                    <button type="submit" class="btn btn-success btn-md"
                        @if ($presentase>=100)
                            disabled
                        @endif
                    >Simpan</button>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>

    <div class="col-md-7" style="margin-top:20px;">
        <div class="col-md-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
                    <h3 class="widget-title text-success">Total Realisasi</h3>
                    <span class="fz-md">Rp {{ number_format($total_realisasi) }},-</span>
				</div>
			</div><!-- .widget -->
		</div>
        <div class="col-md-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
                    <h3 class="widget-title text-success">Presentase Pembayaran</h3>
                    <span class="fz-md">{{ $presentase }} %</span>
				</div>
			</div><!-- .widget -->
		</div>
        <div class="col-md-12">
            <div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Formulir Realisasi Pembayaran</h4>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    <table class="table table-hovered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Termin</th>
                                <th>Tanggal</th>
                                <th>Nilai</th>
                                <th>Kontribusi UI</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventura->laporan_keuangan as $key => $item)
                                <tr>
                                    <td>{{ $key = $key + 1 }}</td>
                                    <td>
                                        @if (is_null($item->termin))
                                            Tanpa Termin
                                        @else
                                            Termin {{ $item->termin }}
                                        @endif
                                    </td>
                                    <td>{{ $item->tanggal_pembayaran }}</td>
                                    <td>{{ number_format($item->nilai_termin, '0') }}</td>
                                    <td>
                                        @if (is_null($item->nilai_kontribusi))
                                            <span class="text-danger btn-kontribusi" data-toggle="modal" data-value="{{ $item->id }}" data-target="#modalkontribusi" style="cursor:pointer;">
                                                Belum Kontribusi
                                            </span>
                                        @else
                                            {{ number_format($item->nilai_kontribusi) }}
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($ventura->laporan_keuangan->count()==0)
                                <tr>
                                    <td colspan="6" class="text-center text-muted"><i>Belum ada data..</i></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div>
    </div>
@endsection

@section('footscript')
    <script src="{{ asset('theme/backend') }}/libs/bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        })

        $('.btn-kontribusi').click(function(){
            var id = $(this).data('value')
            $('#formkontribusi').attr('action', "{{ url('/') }}/kontribusi-ui/store/"+id)
        })
    </script>
@endsection