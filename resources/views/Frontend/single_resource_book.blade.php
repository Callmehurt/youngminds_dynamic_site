@extends('layouts.app')


@section('content')
    <section class="page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('frontend.all_resources') }}" style="text-decoration: none">Resources</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('frontend.all_resources') }}" style="text-decoration: none">Books</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="text-transform: capitalize">{{$book->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div>
                        <h2 style="font-weight: 600;letter-spacing: 1px;text-transform: capitalize">{{$book->title}}</h2>
                        <div style="height: 400px;width: 100%;margin-top: 2rem">
                            <img src="{{ asset('Thumbnails/'.$book->thumbnail) }}" alt="" style="height: 100%;width: 100%;object-position: center;object-fit: cover">
                        </div>
                        <div>
                            <p style="margin-top: 1.5rem">
                                {!! $book->description !!}
                            </p>
                            <a href="{{ route('download.book', [$book->id]) }}" target="_blank"><button style="border: none;background-color: #827FFE;padding: 10px"><i class="fas fa-download" style="margin-right: 5px"></i>Download</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection