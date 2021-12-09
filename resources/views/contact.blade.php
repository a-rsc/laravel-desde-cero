@extends('layouts.main')

@section('title', __('Contact'))

@section('content')
<div class="container py-3 shadow bg-white">
    <div class="row">
        <div class="col">
            <h1 class="py-3">{{ __('Contact') }} / @lang('Contact')</h1>
            <hr>
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf {{-- Protege de ataques XSS --}}
                {{-- @include('partials._validation-errors') --}}
                @include('partials._session-status')
                @include('partials.forms._input', [
                    'type' => 'text',
                    'id' => 'name',
                    'handle' => 'name',
                    'name' => 'Name',
                    'value' => null,
                    'ariaDescribedby' => false,
                    'required' => true,
                    'autocomplete' => 'name',
                    'autofocus' => true
                ])
                @include('partials.forms._input', [
                    'type' => 'email',
                    'id' => 'email',
                    'handle' => 'email',
                    'name' => 'Email',
                    'value' => null,
                    'ariaDescribedby' => 'emailHelp',
                    'required' => true,
                    'autocomplete' => 'email',
                    'autofocus' => false
                ])
                @include('partials.forms._input', [
                    'type' => 'text',
                    'id' => 'subject',
                    'handle' => 'subject',
                    'name' => 'Subject',
                    'value' => null,
                    'ariaDescribedby' => false,
                    'required' => true,
                    'autocomplete' => false,
                    'autofocus' => false
                ])
                @include('partials.forms._textarea', [
                    'id' => 'content',
                    'handle' => 'content',
                    'name' => 'Content',
                    'value' => null,
                    'ariaDescribedby' => false,
                    'required' => true,
                    'autocomplete' => false,
                    'autofocus' => false
                ])
                @include('partials.forms._submit', [
                    'name' => 'Send',
                ])
            </form>
        </div>
    </div>
</div>
@endsection
