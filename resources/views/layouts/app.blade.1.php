<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>

        <title>{{config('app.name', 'UEW Messenger')}}</title>
        
    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            <div class="row">
                @yield('content')
            </div>
        </div>

        <script src="{{URL::asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>
