@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('frontend.all_events') }}" style="text-decoration: none">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div>
                        <div class="singleEvent">
                            <img src="{{ asset('Events/'.$event->image) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div>
                        <div class="singleEvent_detail">
                            <p style="font-size: 35px; font-weight: 600">{{ $event->title }}</p>
                            <p style="font-size: 16px"><strong><i class="far fa-calendar-alt" style="margin-right: 5px;"></i>{{\Carbon\Carbon::parse($event->event_date)->format('M d, Y')}} <i class="far fa-clock" style="margin-right: 5px;margin-left: 1rem"></i>{{ $event->event_time }}</strong></p>
                            <p>{!! $event->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection