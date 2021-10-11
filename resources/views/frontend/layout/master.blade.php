<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
{{--    <link href="{{ mix('css/custom.css')  }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ mix('css/all.css') }}" type="text/css">

    @yield('style')
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">--}}


    <!-- Styles -->



</head>
<body class="antialiased">
@include('frontend.partial._header')

<main role="main">

    @yield('content')

</main>

@include('frontend.partial._footer')
</body>

<script src="{{ mix('js/all.js')  }}"></script>
@yield('script')

</html>

