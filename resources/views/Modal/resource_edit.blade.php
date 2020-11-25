<div class="modal fade" id="resourceModal-{{ $resource->id }}" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Resource</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('resource.update', [$resource->id]) }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <input id="title" type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $resource->title }}" required>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea type="text" rows="5" class="form-control edit_textarea" name="description">{{ $resource->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="float-left">Thumbnail</label>
                        <input type="file" class="form-control-file" name="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="" class="float-left">File</label>
                        <input type="file" class="form-control-file" name="file">
                    </div>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success float-right" style="margin-right: 5px">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>