@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold mb-0.5 text-base ml-1 text-black']) }}>
    {{ $value ?? $slot }}
</label>
