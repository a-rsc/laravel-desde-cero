@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-primary">{{ __('Login') }}</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{-- Protege de ataques XSS --}}
                        @csrf

                        @include('partials.forms._input', [
                            'type' => 'email',
                            'handle' => 'email',
                            'name' => 'Email',
                            'ariaDescribedby' => 'emailHelp',
                            'required' => false,
                            'autocomplete' => 'email',
                            'autofocus' => true
                        ])

                        @include('partials.forms._input', [
                            'type' => 'password',
                            'handle' => 'password',
                            'name' => 'Password',
                            'ariaDescribedby' => false,
                            'required' => false,
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
                                <button type="submit" class="btn btn-primary">
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
    </div>
</div>
@endsection
