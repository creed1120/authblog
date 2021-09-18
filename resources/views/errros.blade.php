@if ($errors->any())
    <div class="w-full">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="p-3 mb-3 bg-red-500 text-white">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif