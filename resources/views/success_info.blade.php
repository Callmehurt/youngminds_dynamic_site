@if(session()->has('success'))
    <button type="button" class="btn btn-success btn-icon-text btn-rounded">
        <i class="ti-face-smile btn-icon-prepend"></i>
        {!! session()->get('success') !!}
    </button>
@endif