@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('frontend.all_posts') }}" style="text-decoration: none">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $singlePost[0]->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="singlePost">
                            <div class="singlePost_img">
                                <img src="{{ asset('Posts/'.$singlePost[0]->image) }}" alt="">
                            </div>
                            <div>
                                <p style="font-size: 35px;color: black;font-weight: 800;line-height: 40px;margin-top: 1.5rem">{{ $singlePost[0]->title }}</p>
                                <p style="font-size: 12px;color: #8b8b8b">By <strong style="text-transform: uppercase;color: black">{{ $singlePost[0]->name }}</strong> - {{\Carbon\Carbon::parse($singlePost[0]->created_at)->format('M d, Y')}}</p>
                            </div>
                            <div class="singlePost_content">
                                {!! $singlePost[0]->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div>
                        <h4 style="font-weight: 600">Recent Post</h4>
                    </div>
                    <div>
                        <div class="recentPost">
                            @foreach($recentPost as $post)
                            <div class="recentPostBx1">
                                <div class="recentPostBx1_img">
                                    <img src="{{ asset('Posts/'.$post->image) }}" alt="">
                                </div>
                                <div class="recentPostBx1_details">
                                    <a href="{{ route('frontend.single_post', [$post->id]) }}" style="text-decoration: none;color: black"><p style="font-weight: 500;font-size: 18px">
                                        @if(strlen($post->title) > 50)
                                            {{substr($post->title, 0, 50) }}
                                            ....
                                        @else
                                            {{ $post->title }}
                                        @endif
                                        </p></a>
                                    <p style="font-size: 12px;color: #8b8b8b"><i class="far fa-calendar-alt" style="margin-right: 5px"></i>{{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}<i class="fas fa-user" style="margin-right: 5px;margin-left: 1rem"></i>{{ $post->name }}</p>
                                </div>
                            </div>
                         @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection