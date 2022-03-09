@extends('layouts.main')

@section('title', "Project: {$project->title}")

@section('content')
    <div class="p-3 container rounded shadow" style="border: 1px solid rgba(0, 0, 0, 0.125);">
        {{-- @include('partials._session-status') <br> --}}
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="text-primary">{{ $project->title }}</h1>

            @auth
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('projects.edit', $project) }}" title="Editar proyecto">Editar proyecto</a>

                <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-project').submit()" title="Eliminar proyecto">Eliminar proyecto</a>
            </div>
        @endauth
        </div>
        <div class="row justify-content-between">
            <div class="col">
                @if ($project->image)
                <img src="/storage/{{ $project->image }}" class="img-fluid rounded mx-auto d-block" alt="" style="height: 250px; object-fit: cover;">
                @endif
                @if ($project->category)
                <a class="badge bg-danger" href="{{ route('categories.show', $project->category) }}">{{ $project->category->category }}</a>
                @endif
                <p class="lead text-secondary">{{ $project->description }}</p>
                <p class="text-end">{{ $project->created_at->diffForHumans() }}</p>
                <a href="{{ route('projects.index') }}" style="text-decoration: none;">< Volver a Proyectos</a>
            </div>
        </div>
    </div>
    <form id="delete-project" method="POST" action="{{ route('projects.destroy', $project) }}">

        @include('partials._validation-errors')

        @csrf
        @method('delete')
    </form>
@endsection
