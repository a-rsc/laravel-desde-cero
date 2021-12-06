@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h1>Home</h1>
    <h2>Bienvenid@ {{ __('Welcome') }} ~ {{ $nombre }}</h2>

    @auth
    {{ auth()->user()->name }}
    @endauth
@endsection
