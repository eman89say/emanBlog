<div class="side-menu m-l-10 m-t-30">
    <aside class="menu">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a href="{{route('manage.dashboard')}}" class="{{Nav::isRoute('manage.dashboard')}}">Dashboard</a></li>
        </ul>
        <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li><a href="{{route('users.index')}}" class="{{Nav::isResource('users')}}">Manage Users</a></li>
            <li>
                <a class="has-submenu {{Nav::hasSegment(['roles','permissions'],2)}}">Roles &amp; Permissions</a>
               <ul class="submenu">
                   <li><a href="{{route('roles.index')}}"> Roles</a></li>
                   <li><a href="{{route('permissions.index')}}">Permissions</a></li>
               </ul>
            </li>

            <li>
                <a class="has-submenu">Accordian menu </a>
                <ul class="submenu">
                    <li><a href="{{route('roles.index')}}"> Roles</a></li>
                    <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>