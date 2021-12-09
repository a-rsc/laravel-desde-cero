@extends('layouts.main')

@section('title', __('Verify Your Email Address'))

@section('content')
    <div class="container py-3 shadow bg-white">
        <div class="row">
            <div class="col">
                <h1 class="py-3">{{ __('Verify Your Email Address') }}</h1>
                <hr>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p>{{ __('If you did not receive the email') }},</p>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf {{-- Protege de ataques XSS --}}
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
@endsection
