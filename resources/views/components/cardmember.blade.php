@props([
    'id' => '',
    'fullname' => '',
    'picture' => '',
    'phone' => '',
    'email' => '',
    'description' => '',
    'status' => '',
    'expire' => '',
])

<div id="" class="card card-compact min-w-72 bg-white shadow-md rounded-md">
    <div class="w-full bg-yellow-100  h-32 rounded-t-md inline-flex p-4 gap-4 items-center">
        <figure class="max-w-24 border-white border-2 rounded-full bg-gray-300 p-4">
            <img class="flex-[1_0_100%]" src="{{ $picture }}" alt="profil">
        </figure>
        <div class="block w-full">
            <h3 class="card-title text-gray-800">{{ $fullname }}</h3>
        </div>
    </div>
    <div class="card-body items-start text-start gap-6">
        <div class="block space-y-2 w-full">
            <div class="inline-flex flex-col gap-2 w-full">
                <label for="label" class="text-sm text-gray-500">Phone</label>
                <h2 class="text-base text-gray-700">{{ $phone }}</h2>
            </div>
            <div class="inline-flex flex-col gap-2 w-full">
                <label for="label" class="text-sm text-gray-500">Email</label>
                <h2 class="text-base text-gray-700">{{ $email }}</h2>
            </div>
            <div class="inline-flex flex-col gap-2 w-full">
                <label for="label" class="text-sm text-gray-500">Description</label>
                <p class="truncate w-full text-base text-gray-700">{{ $description == '' ? '-' : $description }}</p>
            </div>
            <div class="inline-flex flex-col gap-2 w-full">
                <label for="label" class="text-sm text-gray-500">Status Member</label>
                <div class="badge badge-success text-white">
                    {{ $status }}
                </div>
            </div>
            <div class="inline-flex flex-col gap-2 w-full">
                <label for="label" class="text-sm text-gray-500">Berlaku Sampai</label>
                <p class="truncate w-full text-base text-gray-700">{{ $expire }}</p>
            </div>
        </div>

        <div class="card-actions ">
            {{ $slot }}
        </div>
    </div>
</div>
