<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 w-full min-h-screen antialiased">
    {{-- @include('components.top-navigation') --}}
    <div class="flex">
        @include('components.side-navigation')
        <div class="flex-grow ml-64 min-h-screen">
            @yield('content')
        </div>
    </div>
</body>
{{-- @include('layouts.footer') --}}


</html>
