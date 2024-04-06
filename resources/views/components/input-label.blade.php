@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label required block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
