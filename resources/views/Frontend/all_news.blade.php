@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h3>All News</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($allNews as $news)
                <div class="col-lg-4">
                    <div style="margin-top: 1.5rem">
                        <div class="newsBx">
                            <div style="position: relative;width: 100%;height: auto;display: flex;flex-direction: row;justify-content: flex-start">
                                <div class="newsBx_text">
                                    <span style="font-weight: 500;font-family: Poppins, sans-serif;text-decoration: underline; text-decoration-color: yellowgreen;text-decoration-thickness: 2px;">{{ $news->topic }}</span>
                                    <a href="{{ route('frontend.single_news', [$news->id]) }}" style="text-decoration: none;color: black"><p>
                                        @if(strlen($news->title) > 50)
                                            {{substr($news->title, 0, 50) }}
                                            ....
                                        @else
                                            {{ $news->title }}
                                        @endif
                                        </p></a>
                                </div>
                                <div class="newsBx_img">
                                    <img src="{{ asset('News/'.$news->image) }}" alt="">
                                </div>
                            </div>
                            <div class="newsBx_contentText">
                                    @if(strlen($news->content) > 50)
                                        {!! substr($news->content, 0, 50) !!}
                                        ....
                                    @else
                                        {!! $news->content !!}
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-lg-12">
                    <div style="margin-top: 2rem">
                        {{ $allNews->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>

    @endsection