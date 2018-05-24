<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('libraries/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('libraries/js/app.js') }}"> </script>
    <script src="{{ asset('libraries/js/main.js') }}"> </script>

</body>
</html>
