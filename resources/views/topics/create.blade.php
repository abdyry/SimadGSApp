<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Topic') }}
        </h2>
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <!-- In your topic creation form -->
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="card-body">
                    <form  method="POST" action="{{ route('topics.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <x-input-label for="title" class="form-x-input-label">{{ __('Title') }}</x-input-label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}" required autofocus>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <x-input-label for="description" class="form-x-input-label">{{ __('Description') }}</x-input-label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <x-input-label for="media" class="form-x-input-label">{{ __('Upload Video or Image') }}</x-input-label>
                            <input id="media" type="file" class="form-control @error('media') is-invalid @enderror"
                                name="media" accept="video/*,image/*">
                            @error('media')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <x-secondary-button type="submit" class="ms-3">
                            {{ __('Submit') }}
                        </x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>