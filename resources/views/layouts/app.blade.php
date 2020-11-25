<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>YoungMinds</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/52d4f81de8.js" crossorigin="anonymous"></script>
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 25px;font-weight: 600">
                    {{__('YoungMinds')}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="font-size: 16px;font-weight: 500;letter-spacing: 1px;font-family: 'Poppins';color: black !important;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_news') }}">{{ __('News') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_posts') }}">{{ __('Blogs') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_events') }}">{{ __('Events') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_resources') }}">{{ __('Resources') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_news') }}">{{ __('News') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_posts') }}">{{ __('Blogs') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_events') }}">{{ __('Events') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.all_resources') }}">{{ __('Resources') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
            <section style="background-color: white;border-top: 1px solid gainsboro">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="footer" style="position: relative">
                                    <p style="font-size: 16px;font-weight: 500;text-align: center;padding-top: 35px">
                                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> YoungMinds Pvt. Lid.  All rights reserved
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>

{{--    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/popper.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}

</body>

</html>
