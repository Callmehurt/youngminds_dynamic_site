@extends('layouts.admin')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="form-wrapper">
                <span class="login-form-header">Publish New News</span>
                <div class="all_form_section">
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <input id="title" type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea type="text" rows="5" class="form-control edit_textarea" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="topic" type="text" placeholder="Topic Eg: Sports, Entertainment" class="form-control @error('topic') is-invalid @enderror" name="topic" value="{{ old('topic') }}" required>
                            @error('topic')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="news_image" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn submit_button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection