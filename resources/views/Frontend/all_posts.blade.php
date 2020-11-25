@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h3>All Blogs</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($allPosts as $post)

                <div class="col-3">
                    <div style="margin-top: 1.5rem">
                        <div class="postBx shadow-sm">
                            <div class="postBx_Img">
                                <img src="{{ asset('Posts/'.$post->image) }}" alt="">
                            </div>
                            <div class="postBx_Text">
                                <p style="margin-top: 0.5rem;color: #979797">{{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}</p>
                                <a href="{{ route('frontend.single_post', [$post->id]) }}" style="text-decoration: none;color: black"><p style="font-size: 20px;font-weight: 600;line-height: 25px">
                                    @if(strlen($post->title) > 50)
                                        {{substr($post->title, 0, 50) }}
                                        ....
                                    @else
                                        {{ $post->title }}
                                    @endif
                                    </p></a>
                                <p style="color: #979797">
{{--                                    {!! $post->content !!}--}}
                                    @if(strlen($post->content) > 120)
                                        {!! substr($post->content, 0, 120) !!}
                                        ....
                                    @else
                                        {!! $post->content !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                 @endforeach

                    <div class="col-lg-12">
                        <div style="margin-top: 2rem">
                            {{ $allPosts->links() }}
                        </div>
                    </div>



            </div>
        </div>
    </section>
    @endsection