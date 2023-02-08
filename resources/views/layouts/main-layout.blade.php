<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Auth</title>

    @vite('resources/js/app.js')
    @yield('head')

</head>
<body>
    
    @include('components.header')
    @include('components.errors')

    @yield('content')

    @include('components.footer')
    
</body>
</html>