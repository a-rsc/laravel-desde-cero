{{-- Protege de ataques XSS --}}
@csrf

<div class="form-group py-2">
    <label for="title">@lang('Title')</label>
    <input class="form-control bg-light shadow-sm @error('title') is-invalid @else border-0 @enderror" type="text" id="title" name="title" placeholder="@lang('Title')" value="{{ old('title', $project->title) }}" autofocus>
    @error('title')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group py-2">
    <label for="description">@lang('Description')</label>
    <textarea class="form-control bg-light shadow-sm @error('description') is-invalid @else border-0 @enderror" id="description" name="description" cols="30" rows="10" placeholder="@lang('Description')">{{ old('description', $project->description) }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<button class="btn btn-primary">@lang($button)</button>
