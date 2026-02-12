<div class="form-group mb-4">
    <label for="{{ $name }}" class="form-label fw-bold">
        {{ $label }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>

    <input
        type="text"
        class="form-control {{ $error ? 'is-invalid' : '' }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder ?? '' }}"
        {{ $required ? 'required' : '' }}
        {{ $maxlength ? 'maxlength=' . $maxlength : '' }}
    >

    @if($error)
        <div class="invalid-feedback d-block">{{ $error }}</div>
    @endif
</div>

<style>
    .form-control:focus {
        border-color: #003f3a;
        box-shadow: 0 0 0 0.2rem rgba(0, 63, 58, 0.25);
    }
</style>
