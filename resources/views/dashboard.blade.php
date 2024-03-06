<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Topics') }}
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($topics as $topic)
                <a href="{{ route('topics.show', $topic) }}">
                    <div class="relative rounded-lg shadow-lg overflow-hidden bg-white dark:bg-gray-800 transition-transform transform hover:-translate-y-1 hover:shadow-xl cursor-pointer">
                        @if ($topic->media_path)
                            <img src="{{ asset(Storage::url($topic->media_path)) }}" alt="{{ $topic->title }}" class="w-full h-64 object-cover object-center">
                        @endif
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $topic->title }}</h3>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
