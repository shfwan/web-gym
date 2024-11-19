@props([
    'id' => '',
    'fullname' => '',
    'picture' => '',
    'phone' => '',
    'email' => '',
    'description' => '',
    'status' => '',
    'created_at' => '',
    'expire' => null,
])

<div id="" class="card card-compact min-w-72 bg-white shadow-md rounded-md">
    <div class="w-full bg-yellow-100  h-32 rounded-t-md inline-flex p-4 gap-4 items-center">
        <figure id="image-view" class="max-w-24 border-white border-2 rounded-full bg-gray-300 cursor-pointer">
            <img class="flex-[1_0_100%] object-cover aspect-square" src="{{ $picture != "" ? asset('storage/upload/' . $picture) : asset('/icon/account.png') }}"
                alt="profil">
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
                <div class="badge {{ $status ? 'badge-success' : 'badge-error' }} text-white">
                    {{ $status ? 'Aktif' : 'Tidak Aktif' }}
                </div>
            </div>
            <div class="inline-flex flex-col gap-2 w-full">
                <label for="label" class="text-sm text-gray-500">Berlaku Dari</label>
                <h3 class="truncate w-full text-base text-gray-700">
                    {{ $created_at == '' ? '-' : $created_at }}</h3>
                <label for="label" class="text-sm text-gray-500">Sampai</label>
                <h3 class="truncate w-full text-base text-gray-700">
                    {{ $expire == '' ? '-' : $expire }}</h3>
            </div>
        </div>

        <div class="card-actions justify-end w-full">
            {{ $slot }}
        </div>
    </div>
</div>
<x-modal class="w-fit" id="image{{ $id }}">
    <img class="flex-[1_0_100% max-w-xl rounded-md aspect-square object-cover size-full bg-gray-300"
        src="{{ asset('storage/upload/' . $picture) }}" alt="image" class="rounded-md" />

</x-modal>

<script type="text/javascript" hidden>
    document.getElementById("image-view").onclick = () => {
        document.getElementById("image{{ $id }}").showModal()
    }
</script>
