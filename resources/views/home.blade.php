@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container py-3 shadow bg-white">
    <div class="row">
        <div class="col">
            <h1 class="py-3">{{ __('Dashboard') }} / @lang('Dashboard')</h1>
            <hr>
            @include('partials._session-status')
            <p>{{ __('You are logged in!') }}</p>
        </div>
    </div>
</div>
@endsection
