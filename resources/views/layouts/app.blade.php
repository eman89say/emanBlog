<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('_includes.header')

</head>
<body>
        @include('_includes.nav.main')
    <div id="app">
        @yield('content')
    </div>

      @include('_includes.footer')


</body>
</html>
