@props([
    'label' => '',
    'name' => '',
    'value' => '',
    'type' => 'text',
    'placeholder' => '',
    'disabled' => false
])

<div class="block w-full space-y-2">
    <label class="font-normal text-sm text-gray-700" for="label">{{ $label }}</label>
    <input
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $disabled ? 'disabled' : '' }}
        class="input input-bordered w-full max-w-full bg-transparent disabled:bg-gray-200 disabled:border-none disabled:text-gray-500 text-black  focus:bg-transparent"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
    />
</div>
