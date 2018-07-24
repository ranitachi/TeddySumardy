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
                            {{ $data->nama }}
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

                                        <div class="col-md-4">
                                            <div class="widget" style="background:#FCFCFC;">
                                                <header class="widget-header" style="background:#FCFCFC;">
                                                    <h4 class="widget-title">Detail Data {{ $data->nama }}</h4>
                                                </header><!-- .widget-header -->
                                                <hr class="widget-separator">
                                                <div class="widget-body">
                                                    <table style="border:0px;width:100%;">
                                                        <tr>
                                                            <td style="width:100px;border:0px;">Nama Ventura</td>
                                                            <td style="border:0px;">: &nbsp;&nbsp;{{ $data->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border:0px;">Nama Pimpinan</td>
                                                            <td style="border:0px;">: &nbsp;&nbsp;{{ $data->pimpinan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border:0px;">Link Website</td>
                                                            <td style="border:0px;">: &nbsp;&nbsp;<a href="http://{{ $data->web }}" target="_blank">Buka Link</a></td>
                                                        </tr>
                                                    </table>
                                                </div><!-- .widget-body -->
                                            </div><!-- .widget -->
                                        </div>

                                        <div class="col-md-8">
                                            <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default" style="background:#FCFCFC;">
                                                    <div class="panel-heading" role="tab" id="heading-1">
                                                        <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                            <h4 class="panel-title">Sejarah {{ $data->nama }}</h4>
                                                            <i class="fa acc-switch"></i>
                                                        </a>
                                                    </div>
                                                    <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1" aria-expanded="true" style="">
                                                        <div class="panel-body">
                                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default" style="background:#FCFCFC;">
                                                    <div class="panel-heading" role="tab" id="heading-2">
                                                        <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                            <h4 class="panel-title">Visi Misi {{ $data->nama }}</h4>
                                                            <i class="fa acc-switch"></i>
                                                        </a>
                                                    </div>
                                                    <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2" aria-expanded="false">
                                                        <div class="panel-body">
                                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default" style="background:#FCFCFC;">
                                                    <div class="panel-heading" role="tab" id="heading-3">
                                                        <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                            <h4 class="panel-title">Deskripsi {{ $data->nama }}</h4>
                                                            <i class="fa acc-switch"></i>
                                                        </a>
                                                    </div>
                                                    <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3" aria-expanded="false">
                                                        <div class="panel-body">
                                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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