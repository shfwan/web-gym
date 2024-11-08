@props([
    'title' => '',
    'description' => '',
    'image' => '',
])

<div class="card card-side bg-white rounded-md border hover:shadow transition-all min-w-72 max-h-32 cursor-pointer p-4">
    <figure class="p-2 max-w-20  bg-gray-100 rounded-md">
        <img class="" src="{{ $image }}" alt="Shoes" class="rounded-md" />
    </figure>
    <div class="card-body items-start text-start">
        <h2 class="card-title text-xl font-bold text-black">{{ $title }}</h2>
        <div class="card-actions justify-end w-full">
            {{ $slot }}
        </div>
    </div>
</div>
