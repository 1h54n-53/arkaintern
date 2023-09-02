<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.head')
    </head>
    <body>
        @include('admin.nav')
        @include('admin.sidebar')
        @yield('body')
        @include('admin.script')
    </body>
</html>