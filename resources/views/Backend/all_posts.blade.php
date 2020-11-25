@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div style="margin-top: 4rem">
                <table class="table table-hover text-center" id="myTable">
                    <thead>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>By</th>
                    <th>Image</th>
                    <tbody>

                    @foreach($posts as $key => $post)
                        <tr>
                            <td data-label="S.N">{{++$key}}</td>
                            <td data-label="Title">
                                @if(strlen($post->title) > 40)
                                    {{ substr($post->title, 0, 40) }}
                                    ....
                                @else
                                    {{$post->title}}
                                @endif
                            </td>
                            <td data-label="Content">
                                @if(strlen($post->content) > 50)
                                    {!! substr($post->content, 0, 50) !!}
                                    ....
                                @else
                                    {!! $post->content !!}
                                @endif
                            </td>
                            <td data-label="By">
                                {{$post->name}}
                            </td>
                            <td data-label="Image">
                                <img src="{{ asset('Posts/'.$post->image) }}" alt="{{$post->image}}" style="height: 50px;width: 50px;object-fit: cover;object-position: center">
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection