@props([
    'name' => '',
    'placeholder' => '',
    'value' => '',
    'action' => '',
])

<form action="{{ $action }}" method="get" class="w-full">
    <label
        class="input input-bordered max-w-lg w-full flex items-center gap-2 bg-transparent text-black border-black focus:border-black focus:bg-transparent">
        <input name="{{ $name }}" type="text" class="grow" placeholder="{{ $placeholder }}"
            value="{{ $value }}" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
            <path fill-rule="evenodd"
                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                clip-rule="evenodd" />
        </svg>
    </label>
</form>
