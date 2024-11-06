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
        {{-- @if (Auth::user() && Auth::user()->role == 'admin')
            @include('components.side-navigation')
            <div class="flex-grow ml-64 min-h-screen">
                @yield('content')
            </div>
        @else
            <div class="flex flex-col w-full">
                @include('components.top-navigation')
                <div class="flex-grow min-h-screen">
                    @yield('content')
                </div>
            </div>
        @endif --}}
        <div class="flex flex-col w-full">
            @include('components.top-navigation')
            <div class="flex-grow min-h-screen">
                @yield('content')
            </div>
        </div>
    </div>
</body>

@include('layouts.footer')


</html>
