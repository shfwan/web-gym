@props(['href' => '#'])

<li class="hover:text-yellow-400">
    <a href="{{ $href }}">{{ $slot }}</a>
</li>
