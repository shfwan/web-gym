@props([
    'class' => 'hover:text-yellow-400',
    'href' => '#',
    'onclick' => null,
])

<li class="{{ $class }} transition-all" onclick="{{ $onclick }}">
    <a href="{{ $href }}">{{ $slot }}</a>
</li>
