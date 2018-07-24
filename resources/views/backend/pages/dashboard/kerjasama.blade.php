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
					<h3 class="widget-title">Jumlah Kerjasama</h3>
					<small class="text-color">Sedang Berlangsung</small>
				</div>
				<span class="pull-right fz-lg fw-500 counter" data-plugin="counterUp">{{ $ks_berlangsung }}</span>
			</div><!-- .widget -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp">{{ $mitra }}</span></h3>
						<small class="text-color">Jumlah Mitra</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-users"></i></span>
				</div>
				<a href="{{ route('instansi.index') }}">
					<footer class="widget-footer bg-primary">
						<small>Lihat Detail</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</a>
			</div><!-- .widget -->
		</div>

		<div class="col-md-4 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">{{ $kerjasamacount }}</span></h3>
						<small class="text-color">Jumlah Kerjasama</small>
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

		<div class="col-md-4 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp">2</span></h3>
						<small class="text-color">Jumlah Usulan Kerjasama</small>
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
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="widget">
			<header class="widget-header">
				<h4 class="widget-title">Persentase Berdasarkan Tipe Mitra</h4>
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
						data: [ {{ $ji_label }} ]
					},
					series : [
						{
							name: 'Persentase Data',
							type: 'pie',
							radius : '55%',
							center: ['50%', '60%'],
							data:[ {{ $ji_value }} ],
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
					<h4 class="widget-title">Kerjasama Terakhir</h4>
				</header>
				<hr class="widget-separator">
				<div class="widget-body">
					<div class="table-responsive">							
						<table class="table no-cellborder">
							<thead>
								<tr>
									<th>Status</th>
									<th>Mitra</th>
									<th>Sifat</th>
									<th>Jenis</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($kerjasama as $ks)
									<tr>
										<td>
											@if (($ks->tanggal_mulai <= date('Y-m-d')) && ($ks->tanggal_selesai >= date('Y-m-d')))
												<span class="label label-success" style="font-size:11px;">Berlangsung</span>
											@elseif(($ks->tanggal_mulai >= date('Y-m-d')))
												<span class="label label-primary" style="font-size:11px;">Belum Dimulai</span>
											@elseif(($ks->tanggal_selesai < date('Y-m-d')))
												<span class="label label-danger" style="font-size:11px;">Sudah Selesai</span>
											@endif	
										</td>	
										<td>{{ $ks->instansi->nama }}</td>	
										<td>{{ $ks->sifat_kerjasama->sifat }}</td>	
										<td
											@if ($ks->jenis_perjanjian=="Kontrak Kerja")
												class="text-primary"
											@elseif($ks->jenis_perjanjian=="PKS/AoI")
												class="text-success"
											@elseif($ks->jenis_perjanjian=="NKB/MoU")
												class="text-purple"
											@endif
										>{{ $ks->jenis_perjanjian }}</td>	
									</tr>
								@endforeach
							</tbody>
						</table>
						<br>
						<div class="text-center">
                            <a href="{{ route('kerjasama.index') }}" class="btn btn-default btn-xs">Lihat Selengkapnya</a>
                        </div>
					</div>
				</div>
			</div><!-- .widget -->
		</div>
	</div>
@endsection