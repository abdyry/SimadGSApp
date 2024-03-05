<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Topic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form action="{{ route('topics.update', $topic) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <input id="title" class="form-input block w-full" type="text" name="title" value="{{ $topic->title }}" required autofocus />
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="form-textarea block w-full" rows="6" required>{{ $topic->description }}</textarea>
                        </div>

                        <!-- Media -->
                        <div class="mb-4">
                            <x-input-label for="media" :value="__('Media (Optional)')" />
                            <input id="media" class="form-input block w-full" type="file" name="media" accept="image/*,video/*" />
                        </div>

                        <div class="flex justify-end">
                            <x-secondary-button class="ms-3">
                                {{ __('Update Topic') }}
                            </x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
