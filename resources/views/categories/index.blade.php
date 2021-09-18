<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 
                    <table class="table-auto border-collapse w-full">
                        <thead class="mb-4">
                          <tr>
                            <th class="text-left">Categories</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="border flex justify-between">
                                    <td class="p-3">{{ $category->name }}</td>
                                    <td class="p-3"><a class="mr-3" href="{{ route('category.edit', ['id' => $category->id]) }}">Edit</a><a href="{{ route('category.delete', ['id' => $category->id]) }}">Delete</a></td>
                                </tr>

                            @empty
                                <td>No Categories Found</td>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>