@extends('layouts.main')

@section('title', "Project: {$project->title}")

@section('content')
    <h1>Editar proyecto</h1>

    @include('partials._validation-errors')

    <form action="{{ route('projects.update', $project) }}" method="post">
        @method('patch')

        @include('projects._form', ['button' => 'Update'])

    </form>
@endsection
