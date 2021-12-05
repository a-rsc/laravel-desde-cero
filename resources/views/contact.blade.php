@extends('layouts.main')

@section('title', 'Contact')

@section('content')
    <h1>Contact</h1>
    @if ($errors->any())
        {{-- {{ var_dump($errors->all()) }} --}}
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="{{ route('contact') }}" method="post">
        {{-- Protege de ataques XSS --}}
        @csrf

        <input type="text" name="name" placeholder="Nombre..." value="{{ old('name') }}" autofocus><br>
        {!! $errors->first('name', '<small style="color: red">:message</small><br>') !!}

        <input type="email" name="email" placeholder="Email..." value="{{ old('email') }}"><br>
        {!! $errors->first('email', '<small style="color: red">:message</small><br>') !!}

        <input type="text" name="subject" placeholder="Asunto..." value="{{ old('subject') }}"><br>
        {!! $errors->first('subject', '<small style="color: red">:message</small><br>') !!}

        <textarea name="content" cols="30" rows="10" placeholder="Contenido...">{{ old('content') }}</textarea><br>
        {!! $errors->first('content', '<small style="color: red">:message</small><br>') !!}

        <button>Enviar</button>
    </form>
@endsection
