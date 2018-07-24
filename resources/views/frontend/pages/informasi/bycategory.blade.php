@extends('frontend.layouts.master')

@section('title')
    <title>SIJAMRA - Fakultas Teknik Universitas Indonesia</title>
    <style>
        tr > td {
            font-size:12px;
        }

        .stream-body > p {
            font-size:14px !important;
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
                            {{ $kategori }}
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
                                    <article class="blog_list single" id="post-4763" style="margin-bottom:10px;">
                                        <section class="article_info article_section with_icon">
                                            <div class="blog-head-line clearfix">
                                                <div class="post-title-holder">
                                                    {{-- <h1 class="entry-title"></h1> --}}
                                                </div><!-- / end div  .post-title-holder -->           
                                            </div><!-- / end div  .blog-head-line -->  
                                        </section> 

                                        <div class="col-md-9">
                                            @foreach ($data as $item)
                                                <div class="media stream-post" style="padding:0px;">
                                                    <div class="media-body">
                                                        <h4 class="media-heading" style="padding-bottom:5px;">
                                                            <a href="{{ route('artikel.slug', $item->slug) }}"><h1 style="margin-top:0px;font-size:20px;padding-bottom:0px;">{{ $item->judul }}</h1></a>
                                                        </h4>
                                                        <small class="media-meta">
                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->toFormattedDateString() }} | Posted by: Administrator
                                                        </small>
                                                        <div class="stream-body m-t-md">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae neque incidunt cumque, dolore eveniet porro asperiores itaque! Eligendi minus cupiditate molestiae praesentium, facilis, neque saepe, soluta sapiente aliquid modi sunt.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-md-3">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item" style="background: #f9c851;"><strong>Kategori Informasi</strong></a>
                                                @foreach ($all_kategori as $item)
                                                    <a href="{{ route('informasi.berita', $item->slug) }}" class="list-group-item" style="font-size:12px;">{{ $item->kategori }}</a>
                                                @endforeach
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