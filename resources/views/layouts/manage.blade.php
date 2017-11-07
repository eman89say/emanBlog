<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('_includes.header')

</head>
<body>
    @include('_includes.nav.main')
    @include('_includes.nav.manage')
    <div class="management-area" id="app">
        @include('_includes.messages')

        @yield('content')
   </div>

    @include('_includes.footer')


</body>
</html>
