@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h3>All Resources</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-12 col-sm-12 p-0">
                    <div class="col-lg-12">
                        <div class="icon">
                            <div class="iconBx active" data-id="content1">
                                Books
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="icon">
                            <div class="iconBx" data-id="content2">
                                Videos
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="resource-content">
                        <div class="contentBx active" id="content1">
                            <div class="row">

                                @foreach($books as $book)
                                <div class="col-lg-6">
                                    <div class="childContentBx shadow-sm">
                                        <div class="contentBx_img">
                                            <img src="{{ asset('Thumbnails/'.$book->thumbnail) }}" alt="">
                                        </div>
                                        <div class="contentBx_content">
                                            <p style="margin-top: 1.5rem">
                                                @if(strlen($book->description) > 76)
                                                    {!! substr($book->description, 0, 76) !!}
                                                    ....
                                                @else
                                                    {!! $book->description !!}
                                                @endif
                                            </p>
                                            <a href="{{ route('frontend.single_book', [$book->id]) }}">
                                            <button>
                                                View Detail
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               @endforeach

                            </div>
                            <div class="row">
                                <div>
                                    {{ $books->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="contentBx" id="content2">
                            <div class="row">
                                @foreach($videos as $video)
                                <div class="col-lg-6">
                                    <div class="childContentBx shadow-sm">
                                        <div class="contentBx_img">
                                            <img src="{{ asset('Thumbnails/'.$video->thumbnail) }}" alt="">
                                        </div>
                                        <div class="contentBx_content">
                                            <p style="margin-top: 1.5rem">
                                                @if(strlen($video->description) > 76)
                                                    {!! substr($video->description, 0, 76) !!}
                                                    ....
                                                @else
                                                    {!! $video->description !!}
                                                @endif
                                            </p>
                                            <a href="{{ route('frontend.single_video', [$video->id]) }}">
                                                <button>
                                                    Watch Video
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div>
                                    {{ $videos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">

        var iconBx = document.querySelectorAll('.iconBx');
        var contentBx = document.querySelectorAll('.contentBx');

        for (var i=0; i<iconBx.length; i++){
            iconBx[i].addEventListener('click', function(){
                for (var i=0; i<contentBx.length; i++){
                    contentBx[i].className = 'contentBx';
                }
                document.getElementById(this.dataset.id).className = 'contentBx active';

                for (var i=0; i<iconBx.length; i++){
                    iconBx[i].className = 'iconBx';
                }
                this.className = 'iconBx active';
            });
        }

    </script>

    @endsection