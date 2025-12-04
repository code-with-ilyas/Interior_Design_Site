@props(['name', 'label', 'options', 'selected' => [], 'multiple' => true, 'placeholder' => 'Select options...', 'helpText' => ''])

<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif

    <select
        name="{{ $name }}@if($multiple)[]@endif"
        id="{{ $name }}"
        @if($multiple) multiple @endif
        {{ $attributes->merge(['class' => 'tomselect mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}
    >
        @if(!$multiple)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $value => $label)
            <option value="{{ $value }}"
                @if($multiple && in_array((string) $value, old($name, $selected)))
                    selected
                @elseif(!$multiple && old($name, $selected) == $value)
                    selected
                @endif
            >
                {{ $label }}
            </option>
        @endforeach
    </select>

    @if($helpText)
        <p class="mt-1 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
</div>
