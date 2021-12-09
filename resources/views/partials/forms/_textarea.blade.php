<div class="row mb-3">
    <label for="{{ $id }}" class="col-md-4 col-form-label text-md-right">{{ __($name) }}@if ($required) <span class="required">*</span> @endif</label>

    <div class="col-md-6">
        <textarea
            id="{{ $id }}"
            class="form-control bg-light shadow-sm @error($handle) is-invalid @enderror"
            name="{{ $handle }}"
            cols="30" rows="10"
            placeholder="{{ __($name) }}"
            @if ($ariaDescribedby) aria-describedby="{{ $ariaDescribedby }}" @endif
            @if ($required) required @endif
            @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            @if ($autofocus) autofocus @endif>{{ old($handle, $value) }}</textarea>

        @error($handle)
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>
</div>
