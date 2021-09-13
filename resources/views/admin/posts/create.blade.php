<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-label for="title" :value="__('Title')" />
            
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-label for="featured" :value="__('Featured Image')" />
            
                            <x-input id="featured" class="block mt-1 w-full" type="file" name="featured" :value="old('featured')" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-label for="content" :value="__('Content')" />
            
                            <x-textarea id="content" class="block mt-1 w-full" type="text" name="content" cols="5" rows="5" :value="old('content')" required autofocus />
                        </div>

                        <x-button>
                            {{ __('Submit') }}
                        </x-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>