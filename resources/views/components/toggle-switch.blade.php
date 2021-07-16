<div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in select-none">
    <input type="checkbox" name="{{$name}}" id="{{$id}}" @if($checked) checked @endif {{ $attributes->merge(['class'=>"toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"])}}/>
    <label for="{{$id}}" class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer toggle-label"></label>
</div>
