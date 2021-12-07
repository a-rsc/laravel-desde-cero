@extends('layouts.main')

@section('title', 'Contact')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-primary">{{ __('Contact') }} / @lang('Contact')</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.store') }}">
                            {{-- @include('partials._session-status') --}}

                            @include('partials._validation-errors')

                            {{-- Protege de ataques XSS --}}
                            @csrf

                            @include('partials.forms._input', [
                                'type' => 'text',
                                'handle' => 'name',
                                'name' => 'Name',
                                'ariaDescribedby' => false,
                                'required' => false,
                                'autocomplete' => 'name',
                                'autofocus' => true
                            ])

                            @include('partials.forms._input', [
                                'type' => 'email',
                                'handle' => 'email',
                                'name' => 'Email',
                                'ariaDescribedby' => 'emailHelp',
                                'required' => false,
                                'autocomplete' => 'email',
                                'autofocus' => false
                            ])

                            @include('partials.forms._input', [
                                'type' => 'text',
                                'handle' => 'subject',
                                'name' => 'Subject',
                                'ariaDescribedby' => false,
                                'required' => false,
                                'autocomplete' => false,
                                'autofocus' => false
                            ])

                            @include('partials.forms._textarea', [
                                'handle' => 'content',
                                'name' => 'Content',
                                'ariaDescribedby' => false,
                                'required' => false,
                                'autocomplete' => false,
                                'autofocus' => false
                            ])

                            @include('partials.forms._button', [
                                'name' => 'Send',
                            ])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
