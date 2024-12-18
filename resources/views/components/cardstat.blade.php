@props([
    'title' => '',
    'count' => 0,
    'icon' => '',
    'type' => 'default',
])

<div class="w-full min-h-36 shadow border rounded-md flex-row items-center justify-center p-4 gap-4">
    {{-- Icon --}}
    <img src="{{ $icon }}" alt="">

    {{-- Text --}}
    <div class="block w-full space-y-2 place-content-center h-full">
        <h3 class=" text-2xl text-center text-gray-700">{{ $title }}</h3>
        @if ($type == 'currency')
        <h4 class=" text-2xl text-center text-gray-700">@currency($count)</h4>
        @else
        <h4 class=" text-2xl text-center text-gray-700">{{ $count }}</h4>
        @endif
    </div>
</div>
