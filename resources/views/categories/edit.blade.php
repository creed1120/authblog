<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    
                    @if ($errors->any())
                        <div class="w-full">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="p-3 mb-3 bg-red-500 text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-label for="name" :value="__('Category')" />
            
                            <input class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" id="name" value="{{ $category->name }}">
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