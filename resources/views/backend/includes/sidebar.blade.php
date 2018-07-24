<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="{{ asset('theme/backend') }}/assets/images/221.jpg" alt="avatar"/></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username">{{ Auth::user()->name }}</a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>
                  @if (Auth::user()->level==1)
                      Web Admin
                  @endif
                  @if (Auth::user()->level==2)
                      Adm Kerjasama
                  @endif
                  @if (Auth::user()->level==3)
                      Adm Ventura
                  @endif
                  @if (Auth::user()->level==4)
                      Manajer
                  @endif
                  @if (Auth::user()->level==5)
                      Kepala Ventura
                  @endif
                  @if (Auth::user()->level==6)
                      Pengusul Kerjasama
                  @endif
                  @if (Auth::user()->level==7)
                      Adm Aset
                  @endif
                </small>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu animated flipInY">
                <li>
                  <a class="text-color" href="#">
                    <span class="m-r-xs"><i class="fa fa-user"></i></span>
                    <span>Ganti Profil</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="#">
                    <span class="m-r-xs"><i class="fa fa-key"></i></span>
                    <span>Ganti Password</span>
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a class="text-color" href="logout.html">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">

        <li class="active">
          <a href="{{ route('backend.dashboard') }}">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
          </a>
        </li>

        {{-- Web Administrator Access --}}
        @if (Auth::user()->level==1) 
            
          <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
              <i class="menu-icon glyphicon glyphicon-briefcase"></i>
              <span class="menu-text">Profil</span>
              <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
            </a>
            <ul class="submenu">
              <li><a href="{{ route('sejarah.index') }}"><span class="menu-text">Sejarah</span></a></li>
              <li><a href="{{ route('tugas-fungsi.index') }}"><span class="menu-text">Tugas & Fungsi</span></a></li>
              <li><a href="{{ route('struktur-organisasi.index') }}"><span class="menu-text">Struktur Organisasi</span></a></li>
              <li><a href="{{ route('visi-misi.index') }}"><span class="menu-text">Visi Misi</span></a></li>
              <li><a href="{{ route('hubungi-kami.index') }}"><span class="menu-text">Hubungi Kami</span></a></li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text">Artikel</span>
              <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
            </a>
            <ul class="submenu">
              <li><a href="{{ route('kategori-berita.index') }}"><span class="menu-text">Kelola Kategori</span></a></li>
              <li><a href="{{ route('berita.index') }}"><span class="menu-text">Kelola Artikel</span></a></li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
              <i class="menu-icon fa fa-image"></i>
              <span class="menu-text">Galeri</span>
              <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
            </a>
            <ul class="submenu">
              <li><a href="{{ route('galeri-foto.index') }}"><span class="menu-text">Kelola Foto</span></a></li>
              <li><a href="{{ route('galeri-video.index') }}"><span class="menu-text">Kelola Video</span></a></li>
              <li><a href="{{ route('slider.index') }}"><span class="menu-text">Kelola Slider</span></a></li>
            </ul>
          </li>

          <li>
            <a href="{{ route('ventura.index') }}">
              <i class="menu-icon fa fa-building"></i>
              <span class="menu-text">Profil Ventura</span>
            </a>
          </li>
          
          <li>
            <a href="{{ route('regulasi.index') }}">
              <i class="menu-icon fa fa-warning"></i>
              <span class="menu-text">Regulasi</span>
            </a>
          </li>

          <li>
            <a href="{{ route('pengguna.index') }}">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-text">Pengguna</span>
            </a>
          </li>

        @endif

        {{-- Administrator Ventura --}}
        @if (Auth::user()->level==3)
          <li>
            <a href="{{ route('ventura.index') }}">
              <i class="menu-icon fa fa-building"></i>
              <span class="menu-text">Profile Ventura</span>
            </a>
          </li>
          <li>
            <a href="{{ route('client.all') }}">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-text">Client Ventura</span>
            </a>
          </li>
          <li>
            <a href="{{ route('laporan-ventura.all') }}">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text">Laporan Ventura</span>
            </a>
          </li>
        @endif

        {{-- Administrator Kerjasama --}}
        @if (Auth::user()->level==2)
          <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
              <i class="menu-icon fa fa-building"></i>
              <span class="menu-text">Mitra Kerjasama</span>
              <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
            </a>
            <ul class="submenu">
              <li><a href="{{ route('jenis-instansi.index') }}"><span class="menu-text">Kelola Tipe Mitra</span></a></li>
              <li><a href="{{ route('sifat-kerjasama.index') }}"><span class="menu-text">Kelola Sifat Kerjasama</span></a></li>
              <li><a href="{{ route('instansi.index') }}"><span class="menu-text">Kelola Mitra</span></a></li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-text">Data Kerjasama</span>
              <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
            </a>
            <ul class="submenu">
              <li><a href="{{ route('kerjasama.index') }}"><span class="menu-text">Kelola Data Kerjasama</span></a></li>
              <li><a href="{{ route('status-usulan.index') }}"><span class="menu-text">Kelola Status Usulan</span></a></li>
              <li><a href="{{ route('instansi.index') }}"><span class="menu-text">Kelola Usulan Kerjasama</span></a></li>
            </ul>
          </li>

          <li>
            <a href="{{ route('rekap-kerjasama.index') }}">
              <i class="menu-icon fa fa-line-chart"></i>
              <span class="menu-text">Rekapitulasi Kerjasama</span>
            </a>
          </li>
        @endif

        {{-- Kepala Ventura --}}
        @if (Auth::user()->level==5)
            <li>
              <a href="{{ route('client.index') }}">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">Client</span>
              </a>
            </li>
            <li>
              <a href="{{ route('laporan-ventura.index') }}">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">Laporan</span>
              </a>
            </li>
        @endif

        {{-- Manajer Ventura --}}
        @if (Auth::user()->level==4)
            <li>
              <a href="{{ route('kerjasama.index') }}">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">Data Kerjasama</span>
              </a>
            </li>
            <li>
            <a href="{{ route('laporan-ventura.all') }}">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text">Laporan Ventura</span>
            </a>
          </li>
          <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-text">Rekapitulasi Data</span>
              <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
            </a>
            <ul class="submenu">
              <li><a href="{{ route('rekap-kerjasama.index') }}"><span class="menu-text">Rekapitulasi Kerjasama</span></a></li>
              <li><a href="#"><span class="menu-text">Rekapitulasi Ventura</span></a></li>
            </ul>
          </li>
        @endif

      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>