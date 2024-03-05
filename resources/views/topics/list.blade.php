<!-- resources/views/topics/list.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Topics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('My Topics') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("View, edit, or delete your topics.") }}
                    </p>
                </header>

                <ul class="mt-6 space-y-4">
                    @forelse ($topics as $topic)
                        <li class="flex justify-between items-center border-b border-gray-200 dark:border-gray-600 py-4">
                            <span class="text-lg text-gray-800 dark:text-gray-200">{{ $topic->title }}</span>
                            <div>
                                <a href="{{ route('topics.edit', $topic->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                                <form method="POST" action="{{ route('topics.destroy', $topic->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="text-gray-600 dark:text-gray-400">{{ __('No topics found.') }}</li>
                    @endforelse
                </ul>

                <a href="{{ route('topics.create') }}" class="block mt-6 text-blue-500 hover:text-blue-700">{{ __('Create New Topic') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
