@extends('frontend.layouts.master')

@section('title')
    <title>SIJAMRA - Fakultas Teknik Universitas Indonesia</title>
    <style>
        tr > td {
            font-size:12px;
        }
        table {
            border: 0px solid grey !important;
        }
    </style>
	@include('backend.includes.head')
@endsection

@section('content')
    <div class="modal fade" id="modaldokumen" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Revisi Dokumen</h4>
				</div>
				<div class="modal-body">
                    <span>Masukkan revisi dokumen anda:</span>
                    <table class="table table-bordered" style="margin-top:10px;" id="dokumen_pendukung">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama Dokumen</td>
                                <td>File Dokumen</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="form-control check"></td>
                                    <td><input type="text" class="form-control" name="nama_dokumen[]"></td>
                                    <td><input type="file" class="form-control" name="path[]"></td>
                                </tr>
                            </tbody>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
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
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Tutup</button>
					<input type="submit" class="btn btn-success" value="Simpan">
				</div>
			</div>
		</div>
    </div>
    
    <div class="content_holder">
            <section class="top_content clearfix">
                <section class="info_bar clearfix " style="padding-top: 50px;">
                    <section class="heading">
                        <h1>
                            Lacak Status Kerjasama
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

                                        <div class="col-md-12">
                                            <div class="widget" style="background:#FCFCFC;">
                                                <header class="widget-header" style="background:#FCFCFC;">
                                                    <h4 class="widget-title">Formulir Lacak Status Kerjasama</h4>
                                                </header><!-- .widget-header -->
                                                <hr class="widget-separator">
                                                <div class="widget-body">
                                                    <form action="{{ route('kerjasama.search') }}" class="form-horizontal" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Masukkan ID Tracking Anda:</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="id_tracking">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="submit" value="Lacak Sekarang" class="btn btn-success">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- .widget-body -->
                                            </div><!-- .widget -->
                                        </div>

                                        @if (isset($usulan))
                                            <div class="col-md-6">
                                                <div class="widget" style="background:#FCFCFC;">
                                                    <header class="widget-header" style="background:#FCFCFC;">
                                                        <h4 class="widget-title">Data Usulan Kerjasama Anda</h4>
                                                    </header><!-- .widget-header -->
                                                    <hr class="widget-separator">
                                                    <div class="widget-body">
                                                        <table style="width:100%;" id="custom">
                                                            <tr>
                                                                <td class="text-right" style="border:0px;width:150px;">ID Tracking &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->id_tracking }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;width:150px;">Nama Pengusul &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->nama_pengusul }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;">No Telp &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->no_telp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;">Email &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;">Instansi &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->instansi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;">Jenis Kegiatan &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->jenis_kegiatan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;">Lokasi &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">
                                                                    @if ($usulan->lokasi==1)
                                                                        Dalam Negeri
                                                                    @else
                                                                        Luar Negeri
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;">Sifat &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->sifat_kerjasama->sifat }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" style="border:0px;">Manfaat &nbsp;&nbsp;:</td>
                                                                <td style="border:0px;">{{ $usulan->manfaat }}</td>
                                                            </tr>
                                                        </table>
                                                    </div><!-- .widget-body -->
                                                </div><!-- .widget -->
                                            </div>

                                            <div class="col-md-6">
                                                <div class="widget" style="background:#FCFCFC;">
                                                    <header class="widget-header" style="background:#FCFCFC;">
                                                        <h4 class="widget-title">Dokumen Usulan Kerjasama Anda</h4>
                                                    </header><!-- .widget-header -->
                                                    <hr class="widget-separator">
                                                    <div class="widget-body">
                                                        <table class="table-bordered" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:40px;">#</th>
                                                                    <th>Keterangan</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Jam</th>
                                                                    <th>Dokumen</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($usulan->dokumen_usulan as $key => $item)
                                                                    @php
                                                                        $date = explode(' ', $item->created_at);
                                                                    @endphp
                                                                    <tr>
                                                                        <td>{{ $key = $key + 1 }}</td>
                                                                        <td>
                                                                            @if ($item->revisi_ke==0)
                                                                                Dokumen Awal
                                                                            @else
                                                                                Revisi Ke {{ $item->revisi_ke }}
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $date[0] }}</td>
                                                                        <td>{{ $date[1] }}</td>
                                                                        <td><a href="{{ route('usulan.download', $item->path) }}">{{ $item->nama_dokumen }}</a></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <a style="cursor:pointer;" class="btn btn-default"
                                                            @if ($usulan->flag_revisi==0)
                                                                disabled
                                                            @else
                                                                data-toggle="modal" data-target="#modaldokumen"
                                                            @endif
                                                        >
                                                            <i class="fa fa-edit"></i>&nbsp; Revisi Dokumen Saya
                                                        </a>

                                                    </div><!-- .widget-body -->
                                                </div><!-- .widget -->
                                                <div class="widget" style="background:#FCFCFC;">
                                                    <header class="widget-header" style="background:#FCFCFC;">
                                                        <h4 class="widget-title">Status Usulan Kerjasama Anda</h4>
                                                    </header><!-- .widget-header -->
                                                    <hr class="widget-separator">
                                                    <div class="widget-body">
                                                        <table class="table-bordered" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:40px;">#</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Status</th>
                                                                    <th>Keterangan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($usulan->pivot_usulan as $key => $item)
                                                                    <tr>
                                                                        <td>{{ $key = $key + 1 }}</td>
                                                                        <td>{{ $item->tanggal }}</td>
                                                                        <td>
                                                                            <span class="label label-primary">    
                                                                                @foreach ($status as $s)
                                                                                    @if ($s->id == $item->id_status)
                                                                                        {{ $s->status }}
                                                                                    @endif
                                                                                @endforeach
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $item->keterangan }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><!-- .widget-body -->
                                                </div><!-- .widget -->
                                            </div>
                                        @endif

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