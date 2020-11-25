@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div style="margin-top: 4rem">
                <table class="table table-hover text-center">
                    <thead>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>File Type</th>
                    <th>Action</th>
                    <tbody>

                    @foreach($resources as $key => $resource)
                        <tr>
                            <td data-label="S.N">{{++$key}}</td>
                            <td data-label="Title">
                                @if(strlen($resource->title) > 40)
                                    {{ substr($resource->title, 0, 40) }}
                                    ....
                                @else
                                    {{$resource->title}}
                                @endif
                            </td>
                            <td data-label="Description">
                                @if(strlen($resource->description) > 50)
                                    {!! substr($resource->description, 0, 50) !!}
                                    ....
                                @else
                                    {!! $resource->description !!}
                                @endif
                            </td>
                            <td data-label="Thumbnail">
                                <img src="{{ asset('Thumbnails/'.$resource->thumbnail) }}" style="height: 50px;width: 50px;object-fit: cover;object-position: center">
                            </td>
                            <td data-label="File Type">
                                {{$resource->type}}
                            </td>
                            <td data-label="Action" width="200px">
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#resourceModal-{{$resource->id}}">Edit</a>
                                <form action="{{ route('resource.destroy',[$resource->id]) }}" method="post">
                                    @method('post')
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-left">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @include('Modal.resource_edit')
                    @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $resources->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection