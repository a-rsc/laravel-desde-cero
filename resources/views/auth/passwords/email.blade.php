@extends('layouts.main')

@section('title', __('Reset Password'))

@section('content')
    <div class="container py-3 shadow bg-white">
        <div class="row">
            <div class="col">
                <h1 class="py-3">{{ __('Reset Password') }}</h1>
                <hr>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf {{-- Protege de ataques XSS --}}
                    {{-- @include('partials._validation-errors') --}}
                    @include('partials._session-status')
                    @include('partials.forms._input', [
                        'type' => 'email',
                        'id' => 'email',
                        'handle' => 'email',
                        'name' => 'Email',
                        'value' => null,
                        'ariaDescribedby' => 'emailHelp',
                        'required' => true,
                        'autocomplete' => 'email',
                        'autofocus' => true
                    ])
                    @include('partials.forms._submit', [
                        'name' => 'Send Password Reset Link',
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection
