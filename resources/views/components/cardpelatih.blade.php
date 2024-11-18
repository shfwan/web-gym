@props([
    'id' => '',
    'picture' => '',
    'name' => '',
    'description' => '',
    'price' => 0,
    // 'tersedia' => [],
    'onclick' => ''
])

<div class="card bg-white rounded-md border hover:shadow transition-all min-h-20 md:min-w-80 max-h-fit" onclick="{{ $onclick }}">
    <figure class="p-4  max-w-full cursor-pointer" onclick="image{{$id}}.showModal()">
        <img class="flex-[1_0_100%] max-h-96 rounded-md aspect-square object-cover size-full bg-gray-300" src="{{ asset('storage/upload/' . $picture) }}" alt="image" class="rounded-md" />
    </figure>
    <x-modal id="image{{$id}}">
        <img class="flex-[1_0_100% max-w-xl rounded-md aspect-square object-cover size-full bg-gray-300" src="{{ asset('storage/upload/' . $picture) }}" alt="image" class="rounded-md" />
    </x-modal>
    <div class="card-body items-start text-start">
        <h2 class="card-title sm:text-lg text-black">{{ $name }}</h2>
        <h2 class="text-gray-800">@currency($price)</h2>
        <p class="text-wrap overflow-hidden text-sm">{{ $description == "" ? "Tidak ada deskripsi" : $description }}</p>
        <div class="card-actions justify-end w-full">
            {{ $slot }}
        </div>
    </div>
</div>
