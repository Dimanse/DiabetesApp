@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-gray-700 uppercase font-bold dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
