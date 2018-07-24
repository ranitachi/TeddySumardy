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
                <section class="info_bar clearfix" style="padding-top: 50px;">
                    <section class="heading">
                        <h1>
                            Download Regulasi
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
                                                        <th>#</th>
                                                        <th>Nama Regulasi</th>
                                                        <th>Download File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $key => $item)
                                                        <tr>
                                                            <td style="width:50px;">{{ $key = $key + 1 }}</td>
                                                            <td>{{ $item->judul }}</td>
                                                            <td>
                                                                <a href="{{ asset('regulasi') }}/{{ $item->file }}" download>Download</a>
                                                            </td>
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
        
        <script>
            var LIB_URL = "{{ asset('theme/backend') }}"
        </script>

    	@include('backend.includes.script')

@endsection