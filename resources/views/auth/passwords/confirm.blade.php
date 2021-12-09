@extends('layouts.main')

@section('title', __('Confirm Password'))

@section('content')
    <div class="container py-3 shadow bg-white">
        <div class="row">
            <div class="col">
                <h1 class="py-3">{{ __('Confirm Password') }}</h1>
                <hr>
                <p>{{ __('Please confirm your password before continuing.') }}</p>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf {{-- Protege de ataques XSS --}}
                    {{-- @include('partials._validation-errors') --}}
                    @include('partials._session-status')
                    @include('partials.forms._input', [
                        'type' => 'password',
                        'id' => 'password',
                        'handle' => 'password',
                        'name' => 'Password',
                        'value' => null,
                        'ariaDescribedby' => false,
                        'required' => true,
                        'autocomplete' => 'current-password',
                        'autofocus' => true
                    ])
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" title="{{ __('Confirm Password') }}">{{ __('Confirm Password') }}</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" title="{{ __('Forgot Your Password?') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
