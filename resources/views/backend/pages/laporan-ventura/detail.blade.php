@extends('backend.layouts.master')

@section('content')
	<div class="col-md-5">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Detail Laporan Pekerjaan & Keuangan</span>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<table class="table">
                    <tr>
                        <td style="border-top:0px;width:130px;">Nama Ventura</td>
                        <td style="border-top:0px;">: &nbsp;&nbsp;{{ $laporan->ventura->nama }}</td>
                    </tr>
                    <tr>
                        <td>Nama Client</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->client->nama }}</td>
                    </tr>
                    <tr>
                        <td>No Kontrak</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->no_kontrak }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Laporan</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->tanggal_laporan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kontrak</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->jenis_kontrak }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pekerjaan</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->nama_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Penugasan</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->jenis_penugasan }}</td>
                    </tr>
                    <tr>
                        <td>Lokasi Pekerjaan</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->lokasi_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Tanpa Pajak</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->nilai_tanpa_pajak }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Dengan Pajak</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->nilai_dengan_pajak }}</td>
                    </tr>
                    <tr>
                        <td>Realisasi</td>
                        <td>: &nbsp;&nbsp;Rp. {{ $laporan->realisasi }},-</td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->tanggal_mulai }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>: &nbsp;&nbsp;{{ $laporan->tanggal_selesai }}</td>
                    </tr>
                </table>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center" colspan="3">Jumlah Keterlibatan Staf</th>
                    </tr>
                    <tr>
                        <td>Staf Tetap/Dosen UI</td>
                        <td>Pegawai Tetap Lembaga</td>
                        <td>Konsultan Lepas</td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="badge bg-success fz-md">{{ $laporan->jumlah_dosen_terlibat }}</span></td>
                        <td class="text-center"><span class="badge bg-success fz-md">{{ $laporan->jumlah_staf_lembaga_terlibat }}</span></td>
                        <td class="text-center"><span class="badge bg-success fz-md">{{ $laporan->jumlah_konsultan_terlibat }}</span></td>
                    </tr>
                </table>
			</div><!-- .widget-body -->
		</div><!-- .widget -->
    </div>
    
    <div class="col-md-7">
        <div class="col-md-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
                    <h3 class="widget-title text-success">Total Realisasi</h3>
                    <span class="fz-md">Rp {{ number_format($sudah_dibayar) }},-</span>
				</div>
			</div><!-- .widget -->
        </div>
        <div class="col-md-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
                    <h3 class="widget-title text-success">Persentase Pembayaran</h3>
                    <span class="fz-md">{{ $persentase }} %</span>
				</div>
			</div><!-- .widget -->
        </div>
        <div class="col-md-12">
            <div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Persentase Realisasi Pembayaran</h4>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    <div data-plugin="chart" data-options="{
                        tooltip : {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c} ({d}%)'
                        },
                        legend: {
                            orient: 'vertical',
                            x: 'left',
                            data: [ 'Sudah Dibayar', 'Belum Dibayar' ]
                        },
                        series : [
                            {
                                name: 'Persentase Data',
                                type: 'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[ {value:{{ $sudah_dibayar }}, name:'Sudah Dibayar'},{value:{{ $belum_dibayar }}, name:'Belum Dibayar'}, ],
                                itemStyle: {
                                    emphasis: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ]
                    }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1531196547417"><div style="position: relative; overflow: hidden; width: 474px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 474px; height: 300px; user-select: none;"></div><canvas width="474" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 474px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="474" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 474px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="474" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 474px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div></div>
                
                    <strong>Detail Realisasi Pembayaran:</strong>
                    <table class="table table-bordered" style="margin-top:10px;">
                        <tr>
                            <th>#</th>
                            <th>Termin</th>
                            <th>Tanggal</th>
                            <th>Nilai</th>
                            <th>Kontribusi UI</th>
                        </tr>
                        @foreach ($laporan->laporan_keuangan as $key => $item)
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
                                <td>{{ number_format($item->nilai_termin) }}</td>
                                <td>
                                    @if (is_null($item->kontribusi))
                                        <span class="text-danger">Belum Kontribusi</span>
                                    @else
                                        {{ number_format($item->kontribusi) }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @if ($laporan->laporan_keuangan->count()==0)
                            <tr>
                                <td colspan="4" class="text-center text-muted"><i>Belum ada data..</i></td>
                            </tr>
                        @endif
                    </table>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div>
    </div>
@endsection

@section('footscript')
	
@endsection