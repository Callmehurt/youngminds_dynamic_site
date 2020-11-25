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
                    <th>Topic</th>
                    <th>By</th>
                    <th>Image</th>
                    <tbody>

                    @foreach($news as $key => $item)
                        <tr>
                            <td data-label="S.N">{{++$key}}</td>
                            <td data-label="Title">
                                @if(strlen($item->title) > 40)
                                    {{ substr($item->title, 0, 40) }}
                                    ....
                                @else
                                    {{$item->title}}
                                @endif
                            </td>
                            <td data-label="Content">
                                @if(strlen($item->content) > 50)
                                    {!! substr($item->content, 0, 50) !!}
                                    ....
                                @else
                                    {!! $item->content !!}
                                @endif
                            </td>
                            <td data-label="Topic">
                                {{ $item->topic }}
                            </td>
                            @if(Auth::user()->designation == "admin")
                                <td data-label="By">
                                    {{ $item->name }}
                                </td>
                            @endif
                            <td data-label="Image">
                                <img src="{{ asset('News/'.$item->image) }}" alt="{{$item->image}}" style="height: 50px;width: 50px;object-fit: cover;object-position: center">
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection