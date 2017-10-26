<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Eman Blog</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="">
                    Eman Blog
                </a>

                <button class="button navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
                <div class="navbar-menu">
                    <!-- navbar start, navbar end -->
                    <a href="" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                    <a href="" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                    <a href="" class="navbar-item is-tab is-hidden-mobile">Share</a>
                </div>

                @if(Auth::guest())
                    <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                <a href="{{route('register')}}" class="navbar-item is-tab">Join the Community</a>
                @else

                 <div class="navbar-item has-dropdown is-hoverable ">


                     <button class="dropdown is-aligned-right nav-item is-tab">Hey Eman <span class="icon"><i class="fa fa-caret-down"></i> </span>
                     </button>

                    <ul class="dropdown-menu navbar-dropdown is-right">
                        <li><a href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span> Profile</a> </li>
                        <li><a href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i> </span>Notifications</a> </li>
                        <li><a href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i> </span>Settings</a> </li>
                        <li class="navbar-divider"> </li>
                        <li><a href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i> </span>Logout</a> </li>
                    </ul>


                 </div>
                @endif
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
