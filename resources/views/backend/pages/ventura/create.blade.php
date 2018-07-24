@extends('backend.layouts.master')

@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Formulir Tambah Artikel</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="{{ route('ventura.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Ventura</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Pimpinan Ventura</label>
                        <input type="text" class="form-control" name="pimpinan">
                    </div>
                    <div class="form-group">
                        <label>Link Web</label>
                        <input type="text" class="form-control" name="web">
                        <span class="help-block"><i>Contoh: eng.ui.ac.id</i></span>
                    </div>
                    <div class="form-group">
                        <label>Sejarah</label>
                        <textarea name="sejarah" id="ckeditor" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Visi Misi</label>
                        <textarea name="visi_misi" class="ckeditor" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="ckeditor" cols="30" rows="10"></textarea>
                    </div>
                    <br>
                    <div class="user-card p-md">
                        <div class="media">
                            <div class="media-body">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
@endsection

@section('footscript')
    <script src="{{ url('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script>
        var APP_URL = "{{ url('/') }}"

        var options = {
            filebrowserImageBrowseUrl: APP_URL + '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: APP_URL + '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: APP_URL + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: APP_URL + '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>

    <script>
        CKEDITOR.replace( 'ckeditor', options);
        CKEDITOR.config.extraPlugins = 'justify';
    </script>
@endsection