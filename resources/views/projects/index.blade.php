@extends('layouts.main')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- @include('partials._session-status') <br> --}}
            <h1 class="text-primary">{{ __('Projects') }} / @lang('Projects')</h1>
            <p class="lead text-seconday">Lorem ipsum dolor sit amet consectetur adipisicing elit. At vitae illum dicta amet, odit iure eius facilis. Minus error nobis voluptatem. Similique aut perferendis, accusamus commodi harum alias provident in!</p>

            @auth
            <a href="{{ route('projects.create') }}">Crear nuevo proyecto</a>
            @endauth

            <ul class="list-group">
            @forelse ($projects as $project)
                <li class="mb-3 list-group-item shadow-sm">
                    <a class="d-flex justify-content-between align-items-center" href="{{ route('projects.show', $project) }}" style="text-decoration: none;">
                        <span>
                            {{ $project['title'] }}
                            <small style="color: red;">
                                {{ $loop->last ? 'Es el último' : 'No es el último' }}
                            </small>
                        </span>
                        <span>
                            {{ $project['created_at']->format('d-m-Y') . ' / ' . $project['created_at']->diffForHumans() }}
                        </span>
                    </a>
                </li>
                {{-- <pre>{{ var_dump($loop) }}</pre> --}}
            @empty
                <li class="mb-3 list-group-item shadow-sm">No hay proyectos.</li>
            @endforelse
            {{-- @forelse ($projects as $project)
                <li>{{ $project->title }} <small style="color: red;">{{ $loop->last ? 'Es el último' : 'No es el ultimo' }}</small></li>
                @empty
                <li>No hay proyectos.</li>
            @endforelse --}}
            </ul>
            {{ $projects->links() }}
        </div>
    </div>
@endsection
