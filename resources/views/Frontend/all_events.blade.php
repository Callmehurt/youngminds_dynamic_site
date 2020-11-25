@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h3>All Events</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($allEvents as $event)
                <div class="col-lg-12">
                    <div>
                        <div class="eventListBx">
                            <div class="eventListBx_Img">
                                <img src="{{ asset('Events/'.$event->image) }}" alt="">
                            </div>
                            <div class="eventListBx_details">
                                <p style="font-size: 35px; font-weight: 600">{{ $event->title }}</p>
                                <p style="font-size: 16px"><strong><i class="far fa-calendar-alt" style="margin-right: 5px;"></i>{{\Carbon\Carbon::parse($event->event_date)->format('M d, Y')}} <i class="far fa-clock" style="margin-right: 5px;margin-left: 1rem"></i>{{ $event->event_time }}</strong></p>
                                <p>
                                    @if(strlen($event->content) > 150)
                                        {!! substr($event->content, 0, 150) !!}
                                        ....
                                    @else
                                        {!! $event->content !!}
                                    @endif
                                </p>
                                <a href="{{ route('frontend.single_event', [$event->id]) }}"><button class="eventListBx_button">View Details</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach

                    <div class="col-lg-12">
                        <div style="margin-top: 2rem">
                            {{ $allEvents->links() }}
                        </div>
                    </div>

            </div>
        </div>
    </section>


    @endsection