@extends('layouts.main')

@section('title', config('app.name'))

@section('content')
<div class="container py-3 shadow bg-white">
    <div class="row">
        <div class="col">
            <h1 class="py-3">{{ __('Home') }} / @lang('Home')</h1>
            <hr>
            <h2>Bienvenid@ {{ __('Welcome') }} ~ {{ $nombre }}</h2>
            @auth
            {{ auth()->user()->name }}
            @endauth
        </div>
    </div>
</div>
@endsection
