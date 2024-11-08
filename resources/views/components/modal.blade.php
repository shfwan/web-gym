@props([
    'id' => '',
    'title' => '',
])

<dialog id="{{ $id }}" class="modal bg-black/30">
    <div class="modal-box min-w-fit w-fit bg-white">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="relative block w-full space-y-4">
        <h3 class="text-lg font-bold text-center text-gray-600">{{ $title }}</h3>
        <hr>
            {{ $slot }}
        </div>
    </div>
</dialog>
