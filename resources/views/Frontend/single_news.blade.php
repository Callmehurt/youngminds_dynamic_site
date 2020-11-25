@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" style="text-decoration: none">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('frontend.all_news') }}" style="text-decoration: none">News</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$news[0]->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div>
                        <div class="singleNews">
                            <div>
                                <button>{{$news[0]->topic}}</button>
                                <p style="font-size: 35px;color: black;font-weight: 800;line-height: 40px;margin-top: 1.5rem">{{$news[0]->title}}</p>
                                <p style="font-size: 12px;color: #8b8b8b">By <strong style="text-transform: uppercase;color: black">{{$news[0]->name}}</strong> - {{\Carbon\Carbon::parse($news[0]->created_at)->format('M d, Y')}}</p>
                            </div>
                            <div class="singleNews_Img">
                                <img src="{{ asset('News/'.$news[0]->image) }}" alt="">
                            </div>
                            <div class="singleNews_content">
                                <p style="font-size: 16px">
                                    {!! $news[0]->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div>
                        <h4 style="font-weight: 600">Trending News</h4>
                    </div>
                    <div>
                        <div class="trendingNews">
                            @foreach($trendingNews as $trending)
                            <div class="trendingNews_Bx">
                                <div class="trendingNews_detailBx">
                                    <p style="text-decoration: underline; text-decoration-color: yellowgreen;text-decoration-thickness: 2px;font-weight: 500;line-height: 15px">{{ $trending->topic }}</p>
                                    <a href="{{ route('frontend.single_news', [$trending->id]) }}" style="text-decoration: none;color: black"><p style="font-size: 18px;font-weight: 700;line-height: 25px;">
                                            @if(strlen($trending->title) > 50)
                                                {{substr($trending->title, 0, 50) }}
                                                ....
                                            @else
                                                {{ $trending->title }}
                                            @endif
                                        </p></a>
                                    <span style="color: #8b8b8b;line-height: 15px">{{\Carbon\Carbon::parse($trending->created_at)->format('M d, Y')}}</span>
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