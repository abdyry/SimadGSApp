<!-- resources/views/topics/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $topic->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <!-- Topic Details -->
                    <div class="mb-4">
                        <p>{{ $topic->description }}</p>
                        @if ($topic->media_path)
                            @if (Str::startsWith($topic->media_path, 'public/'))
                                <img src="{{ asset(str_replace('public/', 'storage/', $topic->media_path)) }}" alt="Topic Image" class="mt-4" />
                            @else
                                <video src="{{ asset($topic->media_path) }}" controls class="mt-4"></video>
                            @endif
                        @endif
                    </div>

                    <!-- Comments Section -->
                    <h3 class="font-semibold text-lg mb-2">{{ __('Comments') }}</h3>
                    @foreach ($topic->comments as $comment)
                        <div class="border-b border-gray-200 dark:border-gray-600 py-2">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-semibold">{{ $comment->user->name }}</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
