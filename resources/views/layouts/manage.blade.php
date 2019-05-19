<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UEW Messenger - MANAGEMENT</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('js/custom.js') }}"></script>
    

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
    @include('inc.navbar-manage')
    
    <div id="wrapper" class="d-flex">
        @include('inc.sidebar-manage')

        <div class="col page-content-wrapper" id="app">
            @include('inc.messages')
            @yield('content')
        </div>
        
    {{--@include('inc.footer')--}}
    </div>

    {{-- SCRIPTS --}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('textarea').summernote({
                height:250,
            });
            // tinymce.init({ selector: 'textarea' });
        });
        
    </script>
    @yield('scripts')
</body>
</html>
