@extends('backend.layouts.master')

@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Formulir Tambah Artikel</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="form-group">
                        <label>Kategori Artikel</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto Utama</label>
                        <input type="file" class="form-control" name="foto_utama">
                    </div>
                    <div class="form-group">
                        <label>Konten Artikel</label>
                        <textarea name="konten" id="ckeditor" cols="30" rows="10"></textarea>
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