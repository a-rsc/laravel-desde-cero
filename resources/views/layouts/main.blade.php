<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        {{-- Styles cargados en app.scss
        <style>
            .active a {
                color: red;
                text-decoration: none;
            }
        </style> --}}

        <!-- Scripts / el atributo defer permite ejecutarse al final de la carga -->
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </head>
    <body>
        @include('partials._navbar')

        @include('partials._session-status')

        @yield('content')
    </body>
</html>
