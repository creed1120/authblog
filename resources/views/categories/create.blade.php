<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- error messages -->
                    @include('errros')

                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-label for="name" :value="__('Category Name')" />
            
                            <x-input id="category_name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
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