@if (Session::has('message') && ! is_array(Session::get('message')))
    <div class="alert alert-danger" role="alert">
        <span> {{ Session::get('message') }} </span>
    </div>
@endif
@if (Session::has('errorNotice') && ! is_array(Session::get('errorNotice')))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span> {{ Session::get('errorNotice') }} </span>
    </div>
@endif