@props([
    'picture' => '',
    'name' => '',
    'description' => '',
    'price' => 0,
    'onclick' => ''
])

<div class="card bg-white rounded-md border hover:shadow transition-all min-w-72 max-h-fit cursor-pointer" onclick="{{ $onclick }}">
    <figure class="px-4 pt-4 max-w-96">
        <img src="{{ asset('storage/upload/' . $picture) }}" alt="Shoes" class="rounded-md" />
    </figure>
    <div class="card-body items-start text-start">
        <h2 class="card-title text-lg text-black">{{ $name }}</h2>
        <h2 class="card-title text-base text-gray-400">Senin, Selasa, Rabu</h2>
        <p class="text-wrap overflow-hidden text-sm">{{ $description }}</p>
        <h2 class="text-gray-800">@currency($price)</h2>
        <div class="card-actions justify-end w-full">
            {{ $slot }}
        </div>
    </div>
</div>
