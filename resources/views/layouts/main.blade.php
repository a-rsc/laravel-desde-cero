<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="{{ config('seo.meta.defaults.description') }}">
        <meta name="keywords" content="{{ config('seo.meta.defaults.keywords') }}">
        <meta name="author" content="{{ config('seo.meta.defaults.author') }}">

        <!-- CSRF Token -->
        {{-- Token csrf que utiliza Vue.js (axios) / lo agregamos aunque no lo utilicemos --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <!-- Scripts / el atributo defer permite ejecutarse al final de la carga -->
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app" class="d-flex flex-column h-screen justify-content-between">
            <header class="py-3 shadow bg-white">
                @include('partials._navbar')
            </header>
            <main class="mb-auto">
                @yield('content')
            </main>
            <footer class="py-3 shadow bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('welcome') }}" title="{{ config('app.name') }}">{{ config('app.name') }}</a> · &copy; {{ date('Y') }}
                        </div>
                        <div class="col text-end">Aplicación creada por: <a href="#" target="_blank" title="{{ config('app.author') }}">{{ config('app.author') }}</a></div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
