<!-- resources/views/comments/create.blade.php -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf

                        <!-- Content -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Your Comment')" />
                            <textarea id="content" name="content" class="block mt-1 w-full" rows="6" required>{{ old('content') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <!-- Topic ID (hidden) -->
                        <input type="hidden" name="topic_id" value="{{ $topic->id }}" />

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="submit">
                                {{ __('Add Comment') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

