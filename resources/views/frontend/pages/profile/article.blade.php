@extends('frontend.layouts.master')

@section('title')
    <title>SIJAMRA - Fakultas Teknik Universitas Indonesia</title>

@endsection

@section('content')
    <div class="content_holder">
            <section class="top_content clearfix">
                <section class="info_bar clearfix ">
                    <section class="heading">
                        <h1>
                            @switch($data->type)
                                @case(1)
                                    Sejarah
                                    @break
                                @case(2)
                                    Tugas & Fungsi
                                    @break
                                @case(3)
                                    Struktur Organisasi
                                    @break
                                @case(4)
                                    Visi & Misi
                                    @break
                                @case(5)
                                    Hubungi Kami
                                    @break
                                @default
                            @endswitch
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
                                                    <div class="post_data" style="border-top:0px;">
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->toFormattedDateString() }} | Posted by: Administrator
                                                    </div>		
                                                </div><!-- / end div  .post-title-holder -->           
                                            </div><!-- / end div  .blog-head-line -->  
                                        </section> 

                                        <div class="article_content clearfix entry-content">
                                            {!! $data->konten !!}
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