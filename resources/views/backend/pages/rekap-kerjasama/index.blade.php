@extends('backend.layouts.master')

@section('content')
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
            }" style="height: 300px;">
            </div>
          </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
    
    <div class="col-md-6">
		<div class="widget">
          <header class="widget-header">
            <h4 class="widget-title">Persentase Berdasarkan Lokasi Mitra</h4>
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
                    data: [ {{ $lm_label }} ]
                },
                series : [
                    {
                        name: 'Persentase Data',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:[ {{ $lm_value }} ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            }" style="height: 300px;">
            </div>
          </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
    
    <div class="col-md-6">
		<div class="widget">
          <header class="widget-header">
            <h4 class="widget-title">Persentase Berdasarkan Jenis Kerjasama</h4>
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
                    data: [ {{ $jk_label }} ]
                },
                series : [
                    {
                        name: 'Persentase Data',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:[ {{ $jk_value }} ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            }" style="height: 300px;">
            </div>
          </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
    
    <div class="col-md-6">
		<div class="widget">
          <header class="widget-header">
            <h4 class="widget-title">Persentase Berdasarkan Sifat Kerjasama</h4>
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
                    data: [ {{ $sk_label }} ]
                },
                series : [
                    {
                        name: 'Persentase Data',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:[ {{ $sk_value }} ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            }" style="height: 300px;">
            </div>
          </div><!-- .widget-body -->
        </div><!-- .widget -->
	</div>
@endsection