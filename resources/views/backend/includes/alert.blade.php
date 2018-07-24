<div class="col-md-12">

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Berhasil, </strong>
            <span>{{ Session::get('success') }}</span>
        </div>
    @endif

    @if (Session::has('failed'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Oops, terjadi kesalahan. </strong>
            <span>{{ Session::get('failed') }}</span>
        </div>
    @endif
    
</div>