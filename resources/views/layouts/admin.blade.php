<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <h3>YoungMinds</h3>
        </div>
        <ul class="lisst-unstyled components">
            <li>
                <a href="{{ url('/home') }}">Dashboard</a>
            </li>
            @if(Auth::user()->designation == "blogger" || Auth::user()->designation == "admin")
            <li>
                <a href="#postSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Posts</a>
                <ul class="collapse lisst-unstyled" id="postSubmenu">
                    <li>
                        <a href="{{ route('posts.index') }}">Add Post</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.manage_post') }}">My Posts</a>
                    </li>
                    @if(Auth::user()->designation == "admin")
                        <li>
                            <a href="{{ route('posts.all_post') }}">All Posts</a>
                        </li>
                    @endif
                </ul>
            </li>
                <li>
                    <a href="#resourceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Resources</a>
                    <ul class="collapse lisst-unstyled" id="resourceSubmenu">
                        <li>
                            <a href="{{ route('resource.index') }}">Add Resource</a>
                        </li>
                        <li>
                            <a href="{{ route('resource.all_resources') }}">Manage Resources</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->designation == "reporter" || Auth::user()->designation == "admin")
            <li>
                <a href="#newsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">News</a>
                <ul class="collapse lisst-unstyled" id="newsSubmenu">
                    <li>
                        <a href="{{ route('news.index') }}">Add News</a>
                    </li>
                    <li>
                        <a href="{{ route('news.manage_news') }}">My News</a>
                    </li>
                    @if(Auth::user()->designation == "admin")
                    <li>
                        <a href="{{ route('news.all_news') }}">All News</a>
                    </li>
                        @endif
                </ul>
            </li>
            @endif

            @if(Auth::user()->designation == "eventManager" || Auth::user()->designation == "admin")
            <li>
                <a href="#eventsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Events</a>
                <ul class="collapse lisst-unstyled" id="eventsSubmenu">
                    <li>
                        <a href="{{ route('event.index') }}">Add Event</a>
                    </li>
                    <li>
                        <a href="{{ route('event.manage_event') }}">Manage Events</a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->designation == "admin")
            <li>
                <a href="{{ route('user.register_page') }}">Add User</a>
            </li>
                <li>
                    <a href="{{ route('user.all') }}">All Users</a>
                </li>

            @endif
        </ul>
    </nav>

    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-header-nav shadow-sm">
                        <button type="button" id="sidebarCollapse" class="btn btn-info" onclick="toggle()" style="float: left">
                            Toggle
                        </button>
                        <ul style="width: 250px;float: right;margin-top: 10px;">
                            <li class="nav-item dropdown" style="list-style: none;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <div style="height: auto;width: auto;background-color: #1d68a7;position: absolute;right: 15px;bottom: -45px;border: none;border-radius: 10px">
                            @include('success_info')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @yield('content')
        </div>


    </div>

</div>

<script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
<script>

    CKEDITOR.replaceAll( 'edit_textarea' );

    function toggle(){
        $("#sidebar").toggleClass('active')
        $("#sidebarCollapse").toggleClass('active')
    }

</script>

</body>
</html>