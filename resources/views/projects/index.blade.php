@extends('layouts.main')

@section('title', 'Projects')

@section('content')
    <h1>Projects / {{ __('Projects') }} / @lang('Projects')</h1>

    {{-- @include('partials._session-status') <br> --}}

    <a href="{{ route('projects.create') }}">Crear nuevo proyecto</a>

    <ol>
    @forelse ($projects as $project)
        <li><a href="{{ route('projects.show', $project) }}">{{ $project['title'] }}</a> <small style="color: red;">{{ $loop->last ? 'Es el último' : 'No es el ultimo' }}</small> <br> {{ $project['created_at']->format('d-m-Y') . ' / ' . $project['created_at']->diffForHumans() }}</li>
        {{-- <pre>{{ var_dump($loop) }}</pre> --}}
    @empty
        <li>No hay proyectos.</li>
    @endforelse
    {{-- @forelse ($projects as $project)
        <li>{{ $project->title }} <small style="color: red;">{{ $loop->last ? 'Es el último' : 'No es el ultimo' }}</small></li>
        @empty
        <li>No hay proyectos.</li>
    @endforelse --}}
    </ol>
    {{ $projects->links() }}
@endsection
