@props(['type' => 'button', 'variant' => 'primary'])

<button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500']) }} type="{{ $type }}">
    {{ $slot }}
</button>
