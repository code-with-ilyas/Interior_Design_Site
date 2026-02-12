<div class="form-group mb-4">
    <label for="{{ $name }}" class="form-label fw-bold">
        {{ $label }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>

    <select
        class="form-select {{ $error ? 'is-invalid' : '' }}"
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $option)
            <option
                value="{{ $option['value'] }}"
                {{ old($name, $value) === $option['value'] ? 'selected' : '' }}
            >
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>

    @if($error)
        <div class="invalid-feedback d-block">{{ $error }}</div>
    @endif
</div>

<style>
    .form-select:focus {
        border-color: #003f3a;
        box-shadow: 0 0 0 0.2rem rgba(0, 63, 58, 0.25);
    }
</style>
