<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.nav')
        @yield('body')
        @include('partials.footer')
    </body>
</html>