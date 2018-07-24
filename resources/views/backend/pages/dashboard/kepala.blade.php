@extends('backend.layouts.master')

@section('content')

	<div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
					<h3 class="widget-title">Hello, {{ Auth::user()->name }}.</h3>
					<small class="text-color">
						Login Sebagai 
						@if (Auth::user()->level==1)
							Web Administrator
						@endif
						@if (Auth::user()->level==2)
							Administrator Kerjasama
						@endif
						@if (Auth::user()->level==3)
							Administrator Ventura
						@endif
						@if (Auth::user()->level==4)
							Manajer Kerjasama & Ventura
						@endif
						@if (Auth::user()->level==5)
							Kepala Ventura
						@endif
						@if (Auth::user()->level==6)
							Pengusul Kerjasama
						@endif
						@if (Auth::user()->level==7)
							Administrator Aset
						@endif
					</small>
				</div>
				<span class="pull-right fz-lg fw-500 counter">
					<i class="fa fa-user text-success" style="font-size:30px;"></i>
				</span>
			</div><!-- .widget -->
		</div>

		<div class="col-md-6 col-sm-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
					<h3 class="widget-title">Jumlah Client</h3>
					<small class="text-color">Keseluruhan Data</small>
				</div>
				<span class="pull-right fz-lg fw-500 counter" data-plugin="counterUp">{{ $client }}</span>
			</div><!-- .widget -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp">{{ $laporancount }}</span></h3>
						<small class="text-color">Jumlah Laporan Ventura</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-building"></i></span>
				</div>
				<a href="#">
					<footer class="widget-footer bg-primary">
						<small>Lihat Detail</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</a>
			</div><!-- .widget -->
		</div>

		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">{{ $berlangsung }}</span></h3>
						<small class="text-color">Sedang Berlangsung</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
				</div>
				<a href="{{ route('kerjasama.index') }}">
					<footer class="widget-footer bg-danger">
						<small>Lihat Detail</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</a>
			</div><!-- .widget -->
		</div>

		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp">{{ $belummulai }}</span></h3>
						<small class="text-color">Belum Dimulai</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
				</div>
				<a href="#">
					<footer class="widget-footer bg-success">
						<small>Lihat Detail</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</a>
			</div><!-- .widget -->
        </div>
        
		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp">{{ $sudahselesai }}</span></h3>
						<small class="text-color">Sudah Selesai</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
				</div>
				<a href="#">
					<footer class="widget-footer bg-warning">
						<small>Lihat Detail</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</a>
			</div><!-- .widget -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="widget">
			<header class="widget-header">
				<h4 class="widget-title">Persentase Berdasarkan Status Pekerjaan</h4>
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
						data: [ 'Sedang Berlangsung', 'Belum Dimulai', 'Sudah Selesai' ]
					},
					series : [
						{
							name: 'Persentase Data',
							type: 'pie',
							radius : '55%',
							center: ['50%', '60%'],
							data:[ {value:{{ $berlangsung }}, name:'Sedang Berlangsung'}, {value:{{ $belummulai }}, name:'Belum Dimulai'}, {value:{{ $sudahselesai }}, name:'Sudah Selesai'} ],
							itemStyle: {
								emphasis: {
									shadowBlur: 10,
									shadowOffsetX: 0,
									shadowColor: 'rgba(0, 0, 0, 0.5)'
								}
							}
						}
					]
				}" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1531196547417"><div style="position: relative; overflow: hidden; width: 462px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none;"></div><canvas width="462" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><div class="echarts-tooltip zr-element" style="position: absolute; display: none; border-style: solid; white-space: nowrap; transition: left 0.4s, top 0.4s; background-color: rgba(0, 0, 0, 0.9); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); padding: 12px 16px; top: 140px; left: 234px;">Persentase Data <br>Asosiasi Industri : 1 (50.00%)</div></div></div>
			</div><!-- .widget-body -->
			</div><!-- .widget -->
		</div>

		<div class="col-md-6">
			<div class="widget">
				<header class="widget-header">
                    <h4 class="widget-title">Laporan Pekerjaan Terakhir</h4>
                </header>
				<hr class="widget-separator">
				<div class="widget-body">
					<div class="table-responsive">							
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Ventura</th>
									<th>Pekerjaan</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
                                @if ($laporanshow->count()==0)
                                    <tr>
                                        <td colspan="4" class="text-center"><i>Belum ada data</i></td>
                                    </tr>
                                @endif
								@foreach ($laporanshow as $key => $item)
                                    <tr>
                                        <td>{{ $key = $key + 1 }}</td>
                                        <td>{{ $item->ventura->nama }}</td>
                                        <td>{{ $item->nama_pekerjaan }}</td>
                                        <td>
                                            @if (($item->tanggal_mulai <= date('Y-m-d')) && ($item->tanggal_selesai >= date('Y-m-d')))
												<span class="label label-success" style="font-size:11px;">Berlangsung</span>
											@elseif(($item->tanggal_mulai >= date('Y-m-d')))
												<span class="label label-primary" style="font-size:11px;">Belum Dimulai</span>
											@elseif(($item->tanggal_selesai < date('Y-m-d')))
												<span class="label label-danger" style="font-size:11px;">Sudah Selesai</span>
											@endif	
                                        </td>
                                    </tr>
                                @endforeach
							</tbody>
						</table>
						<br>
						<div class="text-center">
                            <a href="{{ route('laporan-ventura.index') }}" class="btn btn-default btn-xs">Lihat Selengkapnya</a>
                        </div>
					</div>
				</div>
			</div><!-- .widget -->
		</div>
	</div>
@endsection