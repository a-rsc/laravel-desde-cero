@extends('layouts.main')

@section('title', 'Portfolio')

@section('content')
    <h1>Portfolio</h1>
    <ul>
    @forelse ($portfolios as $portfolio)
        <li>{{ $portfolio['title'] }} <small style="color: red;">{{ $loop->last ? 'Es el último' : 'No es el ultimo' }}</small></li>
        {{-- <pre>{{ var_dump($loop) }}</pre> --}}
        @empty
        <li>No hay proyectos en el portfolio.</li>
    @endforelse
    </ul>
@endsection
