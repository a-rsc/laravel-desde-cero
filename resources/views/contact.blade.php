@extends('layouts.main')

@section('title', 'Contact')

@section('content')
    <h1>Contact / {{ __('Contact') }} / @lang('Contact')</h1>

    {{-- @include('partials._session-status') --}}

    @include('partials._validation-errors')

    <form action="{{ route('contact.store') }}" method="post">
        {{-- Protege de ataques XSS --}}
        @csrf

        <input type="text" name="name" placeholder="Name..." value="{{ old('name') }}" autofocus><br>
        {!! $errors->first('name', '<small style="color: red">:message</small><br>') !!}

        <input type="email" name="email" placeholder="Email..." value="{{ old('email') }}"><br>
        {!! $errors->first('email', '<small style="color: red">:message</small><br>') !!}

        <input type="text" name="subject" placeholder="Subject..." value="{{ old('subject') }}"><br>
        {!! $errors->first('subject', '<small style="color: red">:message</small><br>') !!}

        <textarea name="content" cols="30" rows="10" placeholder="Content...">{{ old('content') }}</textarea><br>
        {!! $errors->first('content', '<small style="color: red">:message</small><br>') !!}

        <button>@lang('Send')</button>
    </form>
@endsection
