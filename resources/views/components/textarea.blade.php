@props([
    'label' => '',
    'name' => '',
    'placeholder' => '',
    'value' => ''
])
<div class="block w-full space-y-2">
    <label class="font-normal text-sm text-gray-700" for="label">{{ $label }}</label>
    <textarea name="{{ $name }}" placeholder="{{ $placeholder }}" class="textarea textarea-bordered bg-white w-full text-black">{{$value}}</textarea>
</div>
