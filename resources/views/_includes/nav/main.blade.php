<nav class="navbar is-light" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand ">
            <a class="navbar-item" href="{{route('home')}}">
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


                <button class=" dropdown is-aligned-right nav-item is-tab">Hey {{Auth::user()->name}}

                </button>

                <ul class="dropdown-menu navbar-dropdown is-right">
                    <li><a href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span> Profile</a> </li>
                    <li><a href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i> </span>Notifications</a> </li>
                    <li><a href="{{route('manage.dashboard')}}"><span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i> </span>Manage</a> </li>
                    <li class="navbar-divider"> </li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();
 +                     document.getElementById('logout-form').submit();">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i> </span>Logout</a>
                       @include('_includes.forms.logout')

                    </li>
                </ul>

            </div>
        @endif
    </div>
</nav>
