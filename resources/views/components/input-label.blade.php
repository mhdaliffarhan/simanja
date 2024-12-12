@props(['value'])

<label {{ $attributes->merge(['class' => 'col-md-12 col-sm-2 col-form-label']) }}>
    {{ $value ?? $slot }}
</label>
