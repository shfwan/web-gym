@props(['href' => '#'])

<li class="transition-all cursor-pointer rounded-md p-3  {{$href == "/logout" ? "bg-red-600 text-white" : "text-gray-800 hover:font-semibold hover:text-white hover:bg-yellow-400 hover:shadow" }}">
    <a class="w-full" href="{{ $href }}">{{ $slot }}</a>
</li>
