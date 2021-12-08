<div class="row mb-3">
    <label for="{{ $id }}" class="col-md-4 col-form-label text-md-right">{{ __($name) }}@if ($required) * @endif</label>

    <div class="col-md-6">
        <input
            id="{{ $id }}"
            type="{{ $type }}"
            class="form-control @error($handle) is-invalid @enderror"
            name="{{ $handle }}"
            placeholder="{{ __($name) }}"
            value="{{ old($handle, $value) }}"
            @if ($ariaDescribedby) aria-describedby="{{ $ariaDescribedby }}" @endif
            @if ($required) required @endif
            @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            @if ($autofocus) autofocus @endif>
        @if ($ariaDescribedby)
        <div id="{{ $ariaDescribedby }}" class="form-text">{{ __('We\'ll never share your email with anyone else.') }}</div>
        @endif

        @error($handle)
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>
</div>
