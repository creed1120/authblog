@if(Session::has('success'))
    <div class="w-full bg-green-600 p-3 mt-10 text-white rounded-md">
        {!! Session::get('success') !!}
    </div>
@elseif (Session::has('info'))
    <div class="w-full bg-green-600 p-3 mt-10 text-white rounded-md">
        {!! Session::get('info') !!}
    </div>
@elseif (Session::has('warning'))
    <div class="w-full bg-green-600 p-3 mt-10 text-white rounded-md">
        {!! Session::get('warning') !!}
    </div>
@elseif (Session::has('error'))
    <div class="w-full bg-green-600 p-3 mt-10 text-white rounded-md">
        {!! Session::get('error') !!}
    </div>
@endif
