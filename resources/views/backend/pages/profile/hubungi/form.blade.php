@extends('backend.layouts.master')

@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Hubungi Kami</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form 
                    @if (isset($data) && !is_null($data))
                        action="{{ route('hubungi-kami.update', $data->id) }}" 
                    @else
                        action="{{ route('hubungi-kami.store') }}" 
                    @endif
                    method="post">

                    @csrf
                    
                    @if (isset($data) && !is_null($data))
                        @method('PUT')
                    @endif

                    <textarea name="konten" id="ckeditor" cols="30" rows="10">@if (isset($data) && !is_null($data))
                        {{ $data->konten }}
                    @endif</textarea>

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