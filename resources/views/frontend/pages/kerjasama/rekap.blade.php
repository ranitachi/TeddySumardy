@extends('frontend.layouts.master')

@section('title')
    <title>SIJAMRA - Fakultas Teknik Universitas Indonesia</title>
    <style>
        tr > td {
            font-size:12px;
        }
    </style>
	@include('backend.includes.head')
@endsection

@section('content')
    <div class="content_holder">
            <section class="top_content clearfix">
                <section class="info_bar clearfix " style="padding-top: 50px;">
                    <section class="heading">
                        <h1>
                            Rekapitulasi Kerjasama
                        </h1>
                    </section> 
                </section>
            </section>
			<div class="content_second_background">
				<div class="content_area clearfix"> 					
                    <section class="content_block_background" style="background-attachment: scroll;">
                        <section id="row-4763" class="content_block clearfix">
                            <section id="content-4763" class="content full post-4763 post type-post status-publish format-standard has-post-thumbnail hentry">		
                                <div class="row">
                                    <article class="blog_list single" id="post-4763">
                                        <section class="article_info article_section with_icon">
                                            <div class="blog-head-line clearfix">
                                                <div class="post-title-holder">
                                                    {{-- <h1 class="entry-title"></h1> --}}
                                                </div><!-- / end div  .post-title-holder -->           
                                            </div><!-- / end div  .blog-head-line -->  
                                        </section> 

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
                                                        data: [ 'Asosiasi Industri','Institusi Pendidikan','Institusi Pemerintahan', ]
                                                    },
                                                    series : [
                                                        {
                                                            name: 'Persentase Data',
                                                            type: 'pie',
                                                            radius : '55%',
                                                            center: ['50%', '60%'],
                                                            data:[ {value:1, name:'Asosiasi Industri'},{value:1, name:'Institusi Pendidikan'},{value:0, name:'Institusi Pemerintahan'}, ],
                                                            itemStyle: {
                                                                emphasis: {
                                                                    shadowBlur: 10,
                                                                    shadowOffsetX: 0,
                                                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                                }
                                                            }
                                                        }
                                                    ]
                                                }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1531281991979"><div style="position: relative; overflow: hidden; width: 462px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none;"></div><canvas width="462" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div></div>
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
                                                        data: [ 'Dalam Negeri', 'Luar Negeri' ]
                                                    },
                                                    series : [
                                                        {
                                                            name: 'Persentase Data',
                                                            type: 'pie',
                                                            radius : '55%',
                                                            center: ['50%', '60%'],
                                                            data:[ {value:1, name:'Dalam Negeri'},{value:1, name:'Luar Negeri'}, ],
                                                            itemStyle: {
                                                                emphasis: {
                                                                    shadowBlur: 10,
                                                                    shadowOffsetX: 0,
                                                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                                }
                                                            }
                                                        }
                                                    ]
                                                }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1531281991980"><div style="position: relative; overflow: hidden; width: 462px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none;"></div><canvas width="462" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div></div>
                                            </div><!-- .widget-body -->
                                            </div><!-- .widget -->
                                        </div>

                                    </article>
                                </div>
                            </section>
                        </section>
                    </section>
				</div><!-- / end div .content_area -->  
	        </div><!-- / end div .content_second_background -->  
        </div>
        
        <script>
            var LIB_URL = "{{ asset('theme/backend') }}"
        </script>

    	@include('backend.includes.script')

@endsection