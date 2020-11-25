@extends('layouts.app')


@section('content')
    <section style="padding-top: 5rem;padding-bottom: 2rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-bottom: 2rem">
                        <a href="{{ route('frontend.all_news') }}" class="float-right" style="color: #898989;cursor: pointer;font-family: Poppins, sans-serif;font-weight: 600;text-decoration: none;letter-spacing: 1px">All News <i class="fas fa-long-arrow-alt-right" style="margin-left: 5px;"></i></a>
                        <div style="border-bottom: 1px solid #ddeed9">
                            <h4 style="text-align: left;font-weight: bold;letter-spacing: 1px;font-family: Poppins, sans-serif;text-transform: uppercase">News</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div>
                        <div class="news-img-wrapper">
                            <button>{{ $headlineNews[0]->topic }}</button>
                            <div class="news_heading">
                                <a href="{{ route('frontend.single_news', [$headlineNews[0]->id]) }}" style="text-decoration: none"><span>
                                    @if(strlen($headlineNews[0]->title) > 50)
                                        {!! substr($headlineNews[0]->title, 0, 50) !!}
                                        ....
                                    @else
                                        {!! $headlineNews[0]->title !!}
                                    @endif
                                    </span></a>
                            </div>
                            <span style="position: absolute;font-size: 12px;bottom: 2rem;left: 1rem;color: white">By <strong style="text-transform: uppercase">{{ $headlineNews[0]->name }}</strong> - {{\Carbon\Carbon::parse($headlineNews[0]->created_at)->format('M d, Y')}} </span>
                            <img src="{{ asset('News/'.$headlineNews[0]->image) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="parent_newsBx">
                        <div class="newsBx_headText">
                            <h5 style="color: red;font-family: Poppins;text-transform: uppercase;font-style: italic;letter-spacing: 1px;position: absolute;left: 0;top: 0;">The Latest</h5>
                            <p style="color: #898989;font-family: Poppins;position: absolute;right: 0;top: 2px;font-size: 12px;font-weight: 500" id="currentDate"></p>
                        </div>

                        @foreach($latestNews as $news)
                        <div class="newsBx">
                            <div style="position: relative;width: 100%;height: auto;display: flex;flex-direction: row;justify-content: flex-start">
                                <div class="newsBx_text">
                                    <span style="font-weight: 500;font-family: Poppins, sans-serif;text-decoration: underline; text-decoration-color: yellowgreen;text-decoration-thickness: 2px;">{{ $news->topic }}</span>
                                    <a href="{{ route('frontend.single_news', [$news->id]) }}" style="color: black;text-decoration: none;cursor: pointer"><p>
                                            @if(strlen($news->title) > 50)
                                                {!! substr($news->title, 0, 50) !!}
                                                ....
                                            @else
                                                {!! $news->title !!}
                                            @endif
                                        </p></a>
                                </div>
                                <div class="newsBx_img">
                                    <img src="{{ asset('News/'.$news->image) }}" alt="">
                                </div>
                            </div>
                            <div class="newsBx_contentText">
                                    @if(strlen($news->content) > 60)
                                        {!! substr($news->content, 0, 60) !!}
                                        ....
                                    @else
                                        {!! $news->content !!}
                                    @endif
                            </div>

                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding-top: 2rem;padding-bottom: 2rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('frontend.all_posts') }}" class="float-right" style="color: #898989;cursor: pointer;font-family: Poppins, sans-serif;font-weight: 600;text-decoration: none;letter-spacing: 1px">All Blogs <i class="fas fa-long-arrow-alt-right" style="margin-left: 5px;"></i></a>
                    <div style="border-bottom: 1px solid #ddeed9">
                        <h4 style="text-align: left;font-weight: bold;letter-spacing: 1px;font-family: Poppins, sans-serif;text-transform: uppercase">Blogs</h4>
                    </div>
                </div>
            </div>

            @if(count($posts)>0)
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-top: 2rem;margin-bottom: 2rem">
                        <div class="parent_blogBx">
                            <div class="blogBx1">
                                @if(count($posts)>=1)
                                <div class="blogBx2">
                                    <a href="{{ route('frontend.single_post', [$posts[0]->id]) }}" style="text-decoration: none;color: black"><p>
                                        @if(strlen($posts[0]->title) > 25)
                                            {!! substr($posts[0]->title, 0, 25) !!}
                                            ....
                                        @else
                                            {!! $posts[0]->title !!}
                                        @endif
                                        </p></a>
                                    <span style="color: white;font-family: Poppins;position: absolute;right: 0;font-size: 12px;font-weight: 500;bottom: 1rem;left: 1rem">{{\Carbon\Carbon::parse($posts[0]->created_at)->format('M d, Y')}}</span>
                                    <img src="{{ asset('Posts/'.$posts[0]->image) }}" alt="">
                                </div>
                                @endif

                                    @if(count($posts)>=2)
                                    <div class="blogBx2">
                                        <a href="{{ route('frontend.single_post', [$posts[1]->id]) }}" style="text-decoration: none;color: black"><p>
                                        @if(strlen($posts[1]->title) > 25)
                                            {!! substr($posts[1]->title, 0, 25) !!}
                                            ....
                                        @else
                                            {!! $posts[1]->title !!}
                                        @endif
                                            </p></a>
                                    <span style="color: white;font-family: Poppins;position: absolute;right: 0;font-size: 12px;font-weight: 500;bottom: 1rem;left: 1rem">{{\Carbon\Carbon::parse($posts[1]->created_at)->format('M d, Y')}}</span>
                                    <img src="{{ asset('Posts/'.$posts[1]->image) }}" alt="">
                                </div>

                                        @endif

                            </div>
                            @if(count($posts) >= 3)
                            <div class="blogBx3">
                                <a href="{{ route('frontend.single_post', [$posts[2]->id]) }}" style="text-decoration: none;color: black"><p>
                                    @if(strlen($posts[2]->title) > 25)
                                        {!! substr($posts[2]->title, 0, 25) !!}
                                        ....
                                    @else
                                        {!! $posts[2]->title !!}
                                    @endif
                                    </p></a>
                                <span style="color: white;font-family: Poppins;position: absolute;right: 0;font-size: 12px;font-weight: 500;bottom: 1rem;left: 1rem">{{\Carbon\Carbon::parse($posts[2]->created_at)->format('M d, Y')}}</span>
                                <img src="{{ asset('Posts/'.$posts[2]->image) }}" alt="">
                            </div>
                             @else
                                <div class="blogBx3">
                                    <p>
                                    </p>
                                    <span style="color: white;font-family: Poppins;position: absolute;right: 0;font-size: 12px;font-weight: 500;bottom: 1rem;left: 1rem"></span>
                                    <img src="https://picsum.photos/600/400" alt="">
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
                @endif
        </div>
    </section>

    <section style="padding-top: 2rem;height: auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('frontend.all_events') }}" class="float-right" style="color: #898989;cursor: pointer;font-family: Poppins, sans-serif;font-weight: 600;text-decoration: none;letter-spacing: 1px">All Events<i class="fas fa-long-arrow-alt-right" style="margin-left: 5px;"></i></a>
                    <div style="border-bottom: 1px solid #ddeed9">
                        <h4 style="text-align: left;font-weight: bold;letter-spacing: 1px;font-family: Poppins, sans-serif;text-transform: uppercase">Events</h4>
                    </div>
                </div>

            </div>
        </div>
        <section style="background-image: url({{asset('Extra/event_background.jpg')}});margin-top: 2rem;padding-top: 2rem;padding-bottom: 4rem">
        <div class="container">
            <div class="row">

                @foreach($events as $event)
                <div class="col-lg-4">
                    <div class="parent_eventBx shadow-sm">
                        <div class="eventBx_img">
                            <img src="{{ asset('Events/'.$event->image) }}" alt="">
                        </div>
                        <div class="eventBx_Text">
                            <p style="font-size: 25px; font-weight: 600">
                                @if(strlen($event->title) > 20)
                                    {!! substr($event->title, 0, 20) !!}
                                    ....
                                @else
                                    {!! $event->title !!}
                                @endif
                            </p>
                            <p><strong><i class="far fa-calendar-alt" style="margin-right: 5px"></i>{{\Carbon\Carbon::parse($event->event_date)->format('M d, Y')}}</strong></p>
                            <p>
                                @if(strlen($event->content) > 70)
                                    {!! substr($event->content, 0, 70) !!}
                                    ....
                                @else
                                    {!! $event->content !!}
                                @endif
                            </p>
                        </div>
                        <div style="position: relative;width: 100%;height: 60px;">
                            <a href="{{ route('frontend.single_event', [$event->id]) }}"><button class="eventBx_button">View Details<i class="fas fa-long-arrow-alt-right" style="margin-left: 5px;"></i></button></a>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
        </section>
    </section>

    <script>
            // initializing an array
            const months = [
                "January", "February",
                "March", "April", "May",
                "June", "July", "August",
                "September", "October",
                "November", "December"
            ];

            const d = new Date();

            document.getElementById('currentDate').innerHTML = months[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
    </script>

    @endsection