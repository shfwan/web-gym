@props([
    'title' => '',
    'value' => '',
    'type' => ['text', 'number', 'status'],
])

<div class="inline-flex justify-between items-center text-black">
    <label for="{{ $title }}">{{ $title }}</label>
    @if ($type == 'text')
        <h4 class="">{{ $value }}</h4>
    @elseif($type == 'number')
        <h4 class="">@currency($value)</h4>
    @elseif ($type == 'status')
        {{ $slot }}
    @endif
</div>
