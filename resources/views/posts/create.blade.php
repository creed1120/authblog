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
                    
                    @include('errros')
                    
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <x-label for="title" :value="__('Title')" />
            
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus />
                        </div>

                        <div class="mb-4">
                            <x-label for="featured" :value="__('Featured Image')" />
            
                            <x-input id="featured" class="block mt-1 w-full" type="file" name="featured" :value="old('featured')" autofocus />
                        </div>

                        <div class="mb-4">
                            <x-label for="category" :value="__('Select Category')" />
            
                            <select id="category" class="w-full rounded-md" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-label for="content" :value="__('Content')" />
            
                            {{-- <textarea class="w-full" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea> --}}

                            <x-textarea id="content" class="block mt-1 w-full" type="text" name="content" cols="5" rows="5" :value="old('content')" autofocus />
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