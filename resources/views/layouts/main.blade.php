<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        {{-- Token csrf que utiliza Vue.js (axios) / lo agregamos aunque no lo utilicemos --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <div class="d-flex flex-column h-screen justify-content-between" id="app">
            <header>
                @include('partials._navbar')
                @include('partials._session-status')
            </header>
            <main class="py-3">
                @yield('content')
            </main>
            <footer class="py-3 text-center text-black-50 shadow bg-white">
                <div class="container">
                    <a href="{{ route('welcome') }}" title="{{ config('app.name') }}">{{ config('app.name') }}</a> · copyright {{ '@' . date('Y') }}
                </div>
            </footer>
        </div>
    </body>
</html>
