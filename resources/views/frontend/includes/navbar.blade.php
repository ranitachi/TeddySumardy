<header id="header"> 

    <section id="header_contents" class="clearfix">
        <section class="section_logo logo_left two">			 
            <section id="logo">			
                 <a href="#">
                    <img src="{{ asset('theme/frontend') }}/logoventura.jpg" alt="50" width="700">
                </a>
            </section>
        </section>
        
        <section class="section_widget first four">
            <section id="slogan_text" class="right_side ">
                
            </section>
        </section>
        <section class="section_widget second four">
            
        </section>
    </section>

    <div class="sticky_nav_wrap" style="height: 66px;">
        <div class="nav_shadow sticky default_position">
            <div class="nav_border"> 
			    <nav id="navigation_bar" class="navigation  with_small_logo">
                    <div id="sticky_logo">
                        <a href="http://eng.ui.ac.id/en/" title="Fakultas Teknik Universitas Indonesia">
                            <img src="{{ asset('theme/frontend') }}/logo.jpg" alt="Fakultas Teknik Universitas Indonesia">
                        </a>
                    </div>
                    
                    <ul id="navigation" class="menu">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item top-level-0" data-column-size="0">
                            <a href="{{ url('/') }}">Home</a> 
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children hasSubMenu top-level-1" data-column-size="0">
                            <a href="#">Profile</a> 
                            <ul class="sub-menu" style="font-size:12px;">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('front.sejarah') }}">Sejarah</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('front.tugas') }}">Tugas & Fungsi</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('front.struktur') }}">Struktur Organisasi</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('front.visi') }}">Visi & Misi</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('front.hubungi') }}">Hubungi Kami</a> </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children hasSubMenu top-level-1" data-column-size="0">
                            <a href="#">Kerjasama</a> 
                            <ul class="sub-menu" style="font-size:12px;">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('kerjasama.daftar') }}">Daftar Kerjasama</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('kerjasama.rekap') }}">Rekapitulasi Kerjasama</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('kerjasama.mitra') }}">Mitra Kerjasama</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('kerjasama.ajukan') }}">Ajukan Kerjasama</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('kerjasama.tracking') }}">Lacak Kerjasama</a> </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children hasSubMenu top-level-1" data-column-size="0">
                            <a href="#">Informasi</a> 
                            <ul class="sub-menu" style="font-size:12px;">
                                @php
                                    $kategori_navbar = \App\Models\KategoriBerita::all();
                                @endphp
                                @foreach ($kategori_navbar as $item)
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('informasi.berita', $item->slug) }}">{{ $item->kategori }}</a> </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children hasSubMenu top-level-1" data-column-size="0">
                            <a href="#">Ventura</a> 
                            <ul class="sub-menu" style="font-size:12px;">
                                @php
                                    $ventura_navbar = \App\Models\Ventura::orderby('urut')->get();
                                @endphp
                                @foreach ($ventura_navbar as $item)
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('ventura.slug', $item->slug) }}">{{ $item->nama }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children hasSubMenu top-level-1" data-column-size="0">
                            <a href="#">Galeri</a> 
                            <ul class="sub-menu" style="font-size:12px;">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('galeri.foto') }}">Foto</a> </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('galeri.video') }}">Video</a> </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item top-level-0" data-column-size="0">
                            <a href="{{ route('front.regulasi') }}">Regulasi</a> 
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item top-level-0" data-column-size="0">
                            <a href="{{ route('front.hubungi') }}">Hubungi Kami</a> 
                        </li>
                    </ul> 
                </nav>
            </div>
        </div>
    </div>

</header>