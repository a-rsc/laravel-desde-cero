@csrf {{-- Protege de ataques XSS --}}
{{-- @include('partials._validation-errors') --}}
@include('partials._session-status')

@include('partials.forms._input', [
    'type' => 'text',
    'handle' => 'title',
    'name' => 'Title',
    'value' => $project->title,
    'ariaDescribedby' => false,
    'required' => true,
    'autocomplete' => false,
    'autofocus' => true
])

@include('partials.forms._textarea', [
    'handle' => 'description',
    'name' => 'Description',
    'value' => $project->description,
    'ariaDescribedby' => false,
    'required' => true,
    'autocomplete' => false,
    'autofocus' => false
])

@include('partials.forms._button', [
    'name' => $button,
])

@include('partials.forms._cancel', [
    'name' => 'Cancel'
])
