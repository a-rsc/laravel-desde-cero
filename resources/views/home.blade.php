@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h1>Home</h1>
    <h2>Bienvenid@ {{ $nombre ?? 'Invitado' }}</h2>
@endsection
