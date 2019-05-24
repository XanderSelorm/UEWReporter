<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UEW Messenger') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
</head>
<body id="body">
    @include('inc.navbar')
    
    <header class="masthead headMast">
        
        @yield('header')
    </header>

    <div class="container-fluid container-app mx-auto" id="app">
        <div class="" id="myContent">
            @yield('content')
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('textarea').summernote()
        })
    </script>
    @yield('scripts')
</body>
</html>
