@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div style="margin-top: 4rem">
                <table class="table table-hover text-center">
                    <thead>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Image</th>
                    <th>Action</th>
                    </thead>
                    <tbody>

                    @foreach($events as $key => $event)
                        <tr>
                            <td data-label="S.N">{{++$key}}</td>
                            <td data-label="Title">
                                @if(strlen($event->title) > 40)
                                    {{ substr($event->title, 0, 40) }}
                                    ....
                                @else
                                    {{$event->title}}
                                @endif
                            </td>
                            <td data-label="Content">
                                @if(strlen($event->content) > 50)
                                    {!! substr($event->content, 0, 50) !!}
                                    ....
                                @else
                                    {!! $event->content !!}
                                @endif
                            </td>
                            <td data-label="Event Date">
                                {{$event->event_date}}
                            </td>
                            <td data-label="Event Time">
                                {{$event->event_time}}
                            </td>
                            <td data-label="Image">
                                <img src="{{ asset('Events/'.$event->image) }}" alt="{{$event->image}}" style="height: 50px;width: 50px;object-fit: cover;object-position: center">
                            </td>
                            <td data-label="Action">
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#eventModal-{{$event->id}}">Edit</a>
                                <form action="{{ route('event.destroy', [$event->id]) }}" method="post">
                                    @method('post')
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right mr-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @include('Modal.event_edit')
                    @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection