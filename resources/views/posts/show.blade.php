<x-app-layout>
    <x-slot name="header">
        <div class="relative flex justify-center items-center">
            <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="w-full h-full">
            <h1 class="text-4xl font-extrabold text-white absolute bg-gray-800 p-4">{{ $post->title }}</h1>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 
                    {{ $post->title }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>