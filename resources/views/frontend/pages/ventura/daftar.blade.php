@extends('frontend.layouts.master')

@section('title')
    <title>SIJAMRA - Fakultas Teknik Universitas Indonesia</title>
    <style>
        tr > td {
            font-size:12px;
        }
    </style>
@endsection

@section('content')
    <div class="content_holder">
            <section class="top_content clearfix">
                <section class="info_bar clearfix ">
                    <section class="heading">
                        <h1>
                            Daftar Ventura
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

                                        <div class="article_content clearfix entry-content">
                                            <table style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:30px;">#</th>
                                                        <th>Nama Ventura</th>
                                                        <th>Nama Pimpinan</th>
                                                        <th>Website</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $key => $item)
                                                        <tr>
                                                            <td>{{ $key = $key + 1 }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->pimpinan }}</td>
                                                            <td><a href="http://{{ $item->web }}" target="_blank">Kunjungi</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div> 

                                    </article>
                                </div>
                            </section>
                        </section>
                    </section>
				</div><!-- / end div .content_area -->  
	        </div><!-- / end div .content_second_background -->  
	    </div>
@endsection