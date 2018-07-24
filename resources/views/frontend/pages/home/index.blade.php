@extends('frontend.layouts.master')

@section('title')
    <title>SIJAMRA - Fakultas Teknik Universitas Indonesia</title>

@endsection

@section('content')
    <div class="content_holder">
        <section class="top_content header-179264 clearfix">
            <div class="flex-container">
                <div class="flexslider" id="slider-512933">						
                    <div class="flex-viewport">
                        <ul class="slides">
                            @foreach ($slider as $s)
                                <li class="stretch" aria-hidden="true" style="width: 1280px; float: left; display: block;">
                                    <div class="slide_data">
                                        <a href="#">
                                            <img src="{{ asset('galeri/slider') }}/{{ $s->file }}" alt="Image Not Found" 
                                                title="{{ $s->judul }}" draggable="false">
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <ul class="flex-direction-nav">
                        <li><a class="flex-prev" href="#"><span class="icon-left-open"></span></a></li>
                        <li><a class="flex-next" href="#"><span class="icon-right-open"></span></a></li>
                    </ul>
                </div>

                <div class="flex-nav-container"></div>
            </div> 

        </section>		
        
        <div class="content_second_background">
            <div class="content_area clearfix">  
                <div id="row-179264-1" class="content_block_background template_builder " style="background-attachment: scroll;"> 
                    <section class="content_block clearfix">
                        <section id="row-179264-1-content" class="content full  clearfix">
                            <div class="row clearfix">
                                <div class="box two">
                                    <div id="banner-179264-157901" class="banner withborder gradient clearfix fadeIn animated" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single" style="animation-delay: 0s;">	
                                        <a id="" href="{{ route('ventura.all') }}" target="_self" title="STUDENT" class="button_ default small icon-right-hand margin-t10 alignright bounceIn animated">
                                            VENTURA
                                        </a>
                                        <div class="featured_text withbutton small_button ">
                                            <p class=" icon">Ventura</p>
                                        </div>				
                                    </div>
                                </div>

                                <div class="box two">
                                    <div id="banner-179264-157901" class="banner withborder gradient clearfix fadeIn animated" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single" style="animation-delay: 0s;">	
                                        <a id="" href="{{ route('kerjasama.daftar') }}" target="_self" title="STUDENT" class="button_ default small icon-right-hand margin-t10 alignright bounceIn animated">
                                            KERJASAMA
                                        </a>
                                        <div class="featured_text withbutton small_button ">
                                            <p class=" icon">Kerjasama</p>
                                        </div>				
                                    </div>
                                </div>
                            </div>

                            <div id="space-179264-10044" class="clearfix" style="height:20px"></div>
                            
                            <div class="row clearfix">
                                <div class="box two-three ">
                                    <div class="title_line margin-b20">
                                        <h3 class="featured_article_title fade animated" data-rt-animate="animate" data-rt-animation-type="fade" data-rt-animation-group="single" style="animation-delay: 0s;">
                                            <span class="icon-paper-plane heading_icon"></span> News
                                        </h3>
                                    </div>
                                    
                                    <div class="row">
                                        @foreach ($berita as $b)
                                            <div class="box two small_box">
                                                <article class="blog_list loop" id="post-4721">
                                                    <section class="article_section with_icon">
                                                        <div class="blog-head-line clearfix">
                                                            <div class="post-title-holder">
                                                                <h2><a href="{{ route('artikel.slug', $b->slug) }}" rel="bookmark">{{ $b->judul }}</a></h2>
                                                                <div class="post_data">
                                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $b->created_at)->toFormattedDateString() }} | Posted by: Administrator
                                                                </div><!-- / end div  .post_data -->
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="imgeffect aligncenter img_loaded"> 
                                                            <a id="lightbox-617285" class="icon-zoom-in lightbox_" data-group="image_4933" title="Enlarge Image" data-title="{{ $b->judul }}" data-description="" data-thumbnail="{{ asset('images') }}/{{ $b->foto_utama }}" data-thumbtooltip="" data-scaleup="" data-href="" data-width="" data-height="" data-flashhaspriority="" data-poster="" data-autoplay="" data-audiotitle="" href="{{ asset('images') }}/{{ $b->foto_utama }}"></a> 
                                                            <a href="#" class="icon-link" title="{{ $b->judul }}" rel="bookmark"></a>	
                                                            <img src="{{ asset('images') }}/{{ $b->foto_utama }}" alt="" class="" style="height:220px;">
                                                        </div>

                                                        @php
                                                            $konten = explode('.', $b->konten);
                                                        @endphp
                                                        {!! $konten[0] !!}.
                                                        <br>

                                                        <a href="{{ route('artikel.slug', $b->slug) }}">Lihat Selengkapnya</a>
                                                    </section> 
                                                </article> 
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="paging_wrapper margin-t30 margin-b30">
                                        {{-- pagination --}}
                                    </div>
                                </div>

                                <div class="box three">
                                    <div class="title_line margin-b20">
                                        <h3 class="featured_article_title fade animated" data-rt-animate="animate" data-rt-animation-type="fade" data-rt-animation-group="single" style="animation-delay: 0s;">
                                            <span class="icon-videocam heading_icon"></span> Profile
                                        </h3>
                                    </div>

                                    <section id="text-box-179264-4167" class="text_box fadeIn animated" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single" style="animation-delay: 0s;">
                                        <div class="video-container">
                                            
                                            @if (!is_null($video))
                                                @php
                                                    $vid = explode('watch?v=', $video->url);
                                                @endphp
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $vid[1] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            @endif

                                        </div>
                                    </section>

                                    <div id="space-179264-166190" class="clearfix" style="height:30px"></div>

                                    <div class="title_line margin-b20">
                                        <h3 class="featured_article_title fade animated" data-rt-animate="animate" data-rt-animation-type="fade" data-rt-animation-group="single" style="animation-delay: 0s;">
                                            <span class="icon-download heading_icon"></span> Regulasi
                                        </h3>
                                    </div>
                                    <div class="shortcode_tabs tab-style-two fadeIn animated" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single" style="animation-delay: 0s;">
                                        <div class="tabs_wrap">
                                            <ul class="tabs clearfix">
                                                <li><a href="#" class="current">Download</a></li>
                                            </ul>
                                            
                                            <div class="panes"> 
                                                <div class="pane fluid" style="display: none; font-size:12px;">
                                                    <ul>
                                                        @foreach ($regulasi as $r)
                                                            <li>
                                                                <a href="{{ asset('regulasi') }}/{{ $r->file }}" download>{{ $r->judul }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                    <p style="text-align: center;"><a title="Info Pendidikan" href="{{ route('front.regulasi') }}">Lihat Selengkapnya</a></p>
                                                </div> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
                
                <div id="row-179264-2" class="content_block_background template_builder " style="background-attachment: scroll;"> 
                    <section class="content_block clearfix">
                        <section id="row-179264-2-content" class="content full  clearfix">
                            <div class="row clearfix">
                                
                                {{-- logo ft 50 thn --}}

                                {{-- <div class="box three">
                                    <div id="space-179264-43902" class="clearfix" style="height:15px"></div>
                                    <hr class="style-one margin-t0 margin-b0  fadeInDown animated" data-rt-animate="animate" data-rt-animation-type="fadeInDown" data-rt-animation-group="single" style="animation-delay: 0s;">
                                    <div id="space-179264-165156" class="clearfix" style="height:20px"></div>
                                    <section id="text-box-179264-61828" class="text_box fadeIn animated" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single" style="animation-delay: 0s;">
                                        <p>
                                            <a href="#">
                                                <img class="aligncenter  wp-image-244" src="{{ asset('theme/frontend') }}/50-1024x819.png" alt="50" width="233" height="186">
                                            </a>
                                        </p>
                                    </section>
                                </div> --}}

                            </div>
                        </section>
                    </section>
                </div>
            </div>

            <div class="content_footer footer_widgets_holder footer-179264">
                <section class="footer_widgets clearfix footer-widgets-179264 clearfix"></section>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        jQuery(window).load(function() {
            jQuery("#slider-512933").flexslider({
                animation: "slide",
                controlsContainer: "#slider-512933 .flex-nav-container",
                slideshow: true, 
                slideshowSpeed:5*1000,
                smoothHeight: true,
                directionNav: true,
                controlNav:false, 
                prevText: "<span class=\"icon-left-open\"></span>", 
                nextText: "<span class=\"icon-right-open\"></span>",
                start: function( slider ) {
                    slider.parents(".flex-container:eq(0)").removeAttr("style");
                    jQuery.waypoints('refresh');
                },
                after: function(){
                    jQuery.waypoints('refresh');
                },  
            });
        });  
    </script>
@endsection