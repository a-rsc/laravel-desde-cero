@extends('layouts.main')

@section('title', __('Login'))

@section('content')
    <div class="container py-3 shadow bg-white">
        <div class="row">
            <div class="col">
                <h1 class="py-3">{{ __('Login') }}</h1>
                <hr>
                <form method="POST" action="{{ route('login') }}">
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
                    @include('partials.forms._input', [
                        'type' => 'password',
                        'id' => 'password',
                        'handle' => 'password',
                        'name' => 'Password',
                        'value' => null,
                        'ariaDescribedby' => false,
                        'required' => true,
                        'autocomplete' => 'current-password',
                        'autofocus' => false
                    ])
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary" title="{{ __('Login') }}">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
