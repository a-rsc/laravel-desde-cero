@extends('layouts.main')

@section('title', 'Projects')

@section('content')
    <div class="p-3 container rounded shadow" style="border: 1px solid rgba(0, 0, 0, 0.125);">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            {{-- @include('partials._session-status') <br> --}}
            <h1 class="text-primary">{{ __('Projects') }} / @lang('Projects')</h1>
            @auth
            <a class="btn btn-primary btn-sm" href="{{ route('projects.create') }}" title="Crear nuevo proyecto">Crear nuevo proyecto</a>
            @endauth
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <p class="lead text-seconday">Lorem ipsum dolor sit amet consectetur adipisicing elit. At vitae illum dicta amet, odit iure eius facilis. Minus error nobis voluptatem. Similique aut perferendis, accusamus commodi harum alias provident in!</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <ul class="list-group">
                    @forelse ($projects as $project)
                        <li class="mb-3 p-3 list-group-item shadow-sm">
                            <a class="d-flex justify-content-between align-items-center" href="{{ route('projects.show', $project) }}" style="text-decoration: none;" title="{{ $project['title'] }}">
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
                {!! $projects->links() !!}
            </div>
        </div>
    </div>
@endsection
