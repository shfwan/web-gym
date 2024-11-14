@props([
    'label' => '',
    'value' => '',
    'type' => 'text',
])

<div class="flex flex-col gap-2 border rounded-md p-4">
    <label class="font-normal text-sm text-gray-700" for="label">{{ $label }}</label>
    <h1 class="font-medium text-black text-lg truncate">
        @if ($type == 'number')
            @currency($value)
        @else
            {{ $value }}
        @endif
    </h1>
</div>
