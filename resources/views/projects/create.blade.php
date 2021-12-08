@extends('layouts.main')

@section('title', 'Crear nuevo proyecto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="text-primary text-center">Crear nuevo proyecto</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}">

                            @include('partials._validation-errors')

                            @include('projects._form', ['button' => 'Store'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
