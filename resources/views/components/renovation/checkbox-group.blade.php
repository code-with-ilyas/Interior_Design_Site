<div class="form-group mb-4">
    <label class="form-label fw-bold mb-3">
        {{ $label }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>

    <div class="checkbox-group">
        @foreach($options as $option)
            <div class="form-check mb-3 p-3 border rounded {{ in_array($option['value'], $value) ? 'border-primary bg-light' : '' }}">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="{{ $name }}[]"
                    id="{{ $name }}_{{ $option['value'] }}"
                    value="{{ $option['value'] }}"
                    {{ in_array($option['value'], $value) ? 'checked' : '' }}
                >
                <label class="form-check-label w-100 cursor-pointer" for="{{ $name }}_{{ $option['value'] }}">
                    @if(isset($option['icon']))
                        <i class="fas {{ $option['icon'] }} me-2" style="color: #003f3a;"></i>
                    @endif
                    {{ $option['label'] }}
                </label>
            </div>
        @endforeach
    </div>

    @if($error)
        <div class="text-danger mt-2">{{ $error }}</div>
    @endif
</div>

<style>
    .cursor-pointer {
        cursor: pointer;
    }
    .form-check:hover {
        background-color: #f8f9fa !important;
    }
    .form-check.border-primary {
        border-color: #003f3a !important;
    }
</style>
