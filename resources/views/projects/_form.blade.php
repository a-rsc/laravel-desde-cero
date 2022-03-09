@csrf {{-- Protege de ataques XSS --}}
{{-- @include('partials._validation-errors') --}}
@include('partials._session-status')

<div class="mb-3">
    @if ($project->image)
    <img src="/storage/{{ $project->image }}" class="img-fluid rounded mx-auto d-block" alt="">
    @endif

    <label for="formFile" class="form-label">Imagen</label>
    <input class="form-control" type="file" id="formFile" name="image">
</div>

<div class="form-group mb-3">
    <label for="category_id">Categoría del proyecto</label>
    <select class="form-control" name="category_id" id="category_id">
        <option value="">Ninguna categoría</option>
        @foreach ($categories as $id => $category)
        <option value="{{ $id }}" @if ($id == old('category_id', $project->category_id)) selected @endif>{{ $category }}</option>
        @endforeach
    </select>
</div>

@include('partials.forms._input', [
    'type' => 'text',
    'handle' => 'title',
    'name' => 'Title',
    'value' => $project?->title,
    'ariaDescribedby' => false,
    'required' => true,
    'autocomplete' => false,
    'autofocus' => true
])

@include('partials.forms._textarea', [
    'handle' => 'description',
    'name' => 'Description',
    'value' => $project?->description,
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
