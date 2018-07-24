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
                            Formulir Usulan Kerjasama
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

                                        @include('backend.includes.alert')

                                        @if (Session::has('errors'))
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <strong>Oops, terjadi kesalahan. </strong>
                                                    <ul style="font-size:12px;margin-top:5px;">
                                                        @if ($errors->has('nama_pengusul'))
                                                            <li> &nbsp; - {{ $errors->first('nama_pengusul') }}</li>
                                                        @endif
                                                        @if ($errors->has('no_telp'))
                                                            <li> &nbsp; - {{ $errors->first('no_telp') }}</li>
                                                        @endif
                                                        @if ($errors->has('email'))
                                                            <li> &nbsp; - {{ $errors->first('email') }}</li>
                                                        @endif
                                                        @if ($errors->has('instansi'))
                                                            <li> &nbsp; - {{ $errors->first('instansi') }}</li>
                                                        @endif
                                                        @if ($errors->has('lokasi'))
                                                            <li> &nbsp; - {{ $errors->first('lokasi') }}</li>
                                                        @endif
                                                        @if ($errors->has('sifat_kerjasama'))
                                                            <li> &nbsp; - {{ $errors->first('sifat_kerjasama') }}</li>
                                                        @endif
                                                        @if ($errors->has('jenis_kegiatan'))
                                                            <li> &nbsp; - {{ $errors->first('jenis_kegiatan') }}</li>
                                                        @endif
                                                        @if ($errors->has('manfaat'))
                                                            <li> &nbsp; - {{ $errors->first('manfaat') }}</li>
                                                        @endif
                                                        @if ($errors->has('nama_dokumen'))
                                                            <li> &nbsp; - {{ $errors->first('nama_dokumen') }}</li>
                                                        @endif
                                                        @if ($errors->has('path'))
                                                            <li> &nbsp; - {{ $errors->first('path') }}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-md-12">
                                            <div class="widget" style="background:#FCFCFC;">
                                                <header class="widget-header" style="background:#FCFCFC;">
                                                    <h4 class="widget-title">Masukkan Usulan Kerjasama Anda:</h4>
                                                </header><!-- .widget-header -->
                                                <hr class="widget-separator">
                                                <div class="widget-body">
                                                    <form class="form-horizontal" action="{{ route('usulan.store') }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Nama Pengusul</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="nama_pengusul" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Telepon</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="no_telp" required>
                                                                <span class="help-block" style="margin-bottom:0px;">* masukkan nomor telepon yang dapat dihubungi</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control" name="email" required>
                                                                <span class="help-block" style="margin-bottom:0px;">* status usulan kerjasama akan di kirim ke email anda</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Instansi</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="instansi">
                                                                <span class="help-block" style="margin-bottom:0px;">* jika ada</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Lokasi</label>
                                                            <div class="col-sm-9">
                                                                <select name="lokasi" class="form-control" required>
                                                                    <option value="">-- Pilih Lokasi Instansi --</option>
                                                                    <option value="1">Dalam Negeri</option>
                                                                    <option value="2">Luar Negeri</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Sifat Kerjasama</label>
                                                            <div class="col-sm-9">
                                                                <select name="id_sifat_kerjasama" class="form-control" required>
                                                                    <option value="">-- Pilih Sifat Kerjasama --</option>
                                                                    @foreach ($sifat as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->sifat }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Jenis Kegiatan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="jenis_kegiatan" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Manfaat</label>
                                                            <div class="col-sm-9">
                                                                <textarea name="manfaat" class="form-control" cols="30" rows="2" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextInput1" class="col-sm-2 control-label">Dokumen Kerjasama</label>
                                                            <div class="col-sm-9">
                                                                <i>Format Naskah Kerjasama: <a href="#">Download</a></i>
                                                                <table class="table-bordered" style="margin-bottom:0px;margin-top:5px;width:100%;" id="dokumen_pendukung">
                                                                    <thead>
                                                                        <tr>
                                                                            <td style="width:15px;">#</td>
                                                                            <td>Nama Dokumen</td>
                                                                            <td>Upload File</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><i class="fa fa-arrow-right"></i></td>
                                                                            <td><input type="text" class="form-control" name="nama_dokumen[]" value="Naskah Kerjasama" readonly required></td>
                                                                            <td>
                                                                                <input type="file" class="form-control" name="path[]" required>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="table-bordered" style="width:100%;">
                                                                    <tr>
                                                                        <td colspan="3" class="text-right">
                                                                            <a style="cursor:pointer;" id="tambah_dokumen">
                                                                                <i class="fa fa-plus text-success"></i> &nbsp;Tambah Baris
                                                                            </a>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <a style="cursor:pointer;" id="hapus_dokumen">
                                                                                <i class="fa fa-minus text-danger"></i> &nbsp;Hapus Baris
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-9 col-sm-offset-2" style="padding-left:0px;">
                                                                <button type="submit" class="btn btn-success">Kirim Usulan Kerjasama</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <br>
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

@section('footscript')
    <script>
        $('#tambah_dokumen').click(function(){
            var html =  '<tr>' +
                            '<td><input type="checkbox" class="form-control check"></td>' +
                            '<td><input type="text" class="form-control" name="nama_dokumen[]" required></td>' +
                            '<td><input type="file" class="form-control" name="path[]" required></td>' +
                        '</tr>'

            $('#dokumen_pendukung > tbody:last-child').append(html).fadeIn()
        })

        $('#hapus_dokumen').click(function(){
            $('input:checkbox:checked').parents("tr").remove().fadeIn()
        })
    </script>
@endsection