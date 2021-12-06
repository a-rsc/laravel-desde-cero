@extends('layouts.main')

@section('title', "Project: {$project->title}")

@section('content')
    <h1>{{ $project->title }}</h1>

    {{-- @include('partials._session-status') <br> --}}

    @include('partials._validation-errors')

    @auth
    <a href="{{ route('projects.edit', $project) }}">Editar proyecto</a>

    <form action="{{ route('projects.destroy', $project) }}" method="post">
        @csrf
        @method('delete')
        <button>@lang('Delete')</button>
    </form>
    @endauth

    <p>{{ $project->description }}</p>
    <p>{{ $project->created_at->diffForHumans() }}</p>
@endsection
