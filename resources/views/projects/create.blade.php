@extends('layouts.main')

@section('title', 'Crear nuevo proyecto')

@section('content')
    <h1>Crear nuevo proyecto</h1>

    @include('partials._validation-errors')

    <form action="{{ route('projects.store') }}" method="post">

        @include('projects._form', ['button' => 'Store'])

    </form>
@endsection
