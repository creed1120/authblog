<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trashed Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 
                    
                        <div class="grid grid-cols-12 pb-8 sm:px-5 gap-x-8 gap-y-16">
                            @forelse ($posts as $post)
                                <div class="flex flex-col col-span-12 xl:col-span-4 md:col-span-6 mb-5 space-y-3 relative">
                                    {{-- <a href="{{ route('post.show', ['id' => $post->id]) }}" class="block">
                                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-full" alt="{{ $post->title }}" src="{{ $post->featured }}">
                                    </a>
                                    <div class="bg-purple-500 text-center w-1/3 px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white">
                                        <span>the category</span>
                                    </div> --}}
                                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl"><a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                                    <h3 class="text-sm text-gray-500 break-words">{{ $post->content }}</h3>

                                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0 absolute top-full">
                                        <div class="inline-flex rounded-md shadow h-8">
                                          <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="inline-flex items-center justify-center px-5 py-0 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                            Edit
                                          </a>
                                        </div>
                                        <div class="ml-3 inline-flex rounded-md shadow h-8">
                                          <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                                            Restore
                                          </a>
                                        </div>
                                        <div class="ml-3 inline-flex rounded-md shadow h-8">
                                            <a href="{{ route('post.permanant', ['id' => $post->id]) }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                                              Delete Permanently
                                            </a>
                                          </div>
                                      </div>


                                    {{-- <p class="pt-2 text-xs font-medium"><a href="#_" class="mr-1 underline">Mary Jane</a> · <span class="mx-1">April 17, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span></p> --}}
                                </div>

                            @empty
                                <p class="w-80">No Trashed Posts</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>