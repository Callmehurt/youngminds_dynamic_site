@extends('layouts.admin')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="form-wrapper">
                <span class="login-form-header">Publish New Event</span>
                <div class="all_form_section">
                    <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
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
                            <label for="event_date" class="float-left font-weight-bold">Event Date:</label>
                            <input id="event_date" type="date" class="form-control @error('event_date') is-invalid @enderror" name="event_date" value="{{ old('event_date') }}" required>
                            @error('event_date')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="event_time" type="text" placeholder="Event Time" class="form-control @error('event_time') is-invalid @enderror" name="event_time" value="{{ old('event_time') }}" required>
                            @error('event_time')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea type="text" rows="5" class="form-control edit_textarea" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="event_image" required>
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