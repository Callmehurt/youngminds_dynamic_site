<div class="modal fade" id="eventModal-{{ $event->id }}" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('event.update', [$event->id])}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <input id="title" type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $event->title }}" required>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="event_time" type="text" class="form-control @error('event_time') is-invalid @enderror" name="event_time" value="{{ $event->event_time }}" required>
                        @error('event_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="event_date" class="float-left font-weight-bold">Event Date:</label>
                        <input id="event_date" type="date" class="form-control @error('event_date') is-invalid @enderror" name="event_date" value="{{ $event->event_date }}" required>
                        @error('event_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea type="text" rows="5" class="form-control edit_textarea" name="content">{{ $event->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="event_image">
                    </div>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success float-right" style="margin-right: 5px">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>