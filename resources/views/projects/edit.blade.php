@extends('layouts.main')

@section('title', "Project: {$project->title}")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="text-primary text-center">Editar proyecto</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">

                            @include('partials._validation-errors')

                            @method('patch')

                            @include('projects._form', ['button' => 'Update'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
