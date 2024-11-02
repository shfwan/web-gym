@props([
    'picture' => '',
    'name' => '',
    'description' => '',
    'price' => 0
])

<div class="card bg-white rounded-md border hover:shadow transition-all min-w-72 cursor-pointer">
    <figure class="px-4 pt-4">
        <img src="{{ $picture }}" alt="Shoes"
            class="rounded-md" />
    </figure>
    <div class="card-body items-start text-start">
        <h2 class="card-title text-lg text-black">{{ $name }}</h2>
        <p class="text-wrap overflow-hidden text-sm">{{ $description }}</p>
        <h2 class="text-gray-800">@currency($price)</h2>
        <div class="card-actions justify-end w-full">
            {{$slot}}
        </div>
    </div>
</div>
