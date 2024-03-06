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
                        <img src="{{ asset(str_replace('public/', 'storage/', $topic->media_path)) }}" alt="Topic Image"
                            class="mt-4" />
                        @else
                        <video src="{{ asset($topic->media_path) }}" controls class="mt-4"></video>
                        @endif
                        @endif
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $topic->title }}
                        </h2>
                    </div>

                    <!-- Comments Section -->
                    <h3 class="font-semibold text-lg mb-2  text-gray-800 dark:text-gray-200 leading-tight">{{ __('Comments') }}</h3>
                    @include('comments.create')
                    @foreach ($comments as $comment)
                    <div class="comment">
                        <p class="text-gray-800 dark:text-gray-200 leading-tight">{{ $comment->content }}</p>
                        
                        @if ($comment->user_id === auth()->id())
                            <!-- Edit Button -->
                            <button wire:click="editComment({{ $comment->id }})">Edit</button>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                            </form>
                        @endif
                    </div>
                    
                @endforeach
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>