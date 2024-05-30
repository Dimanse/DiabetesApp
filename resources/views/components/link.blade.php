@php
    $classes = "text-sm text-indigo-500 dark:text-gray-400 hover:text-indigo-700 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 cursor-pointer"
@endphp

    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>

