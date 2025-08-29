<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner</title>
    <link rel="icon" href="{{ asset('image/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css">
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex flex-col">
        <div
            class="flex items-center justify-between border-b border-slate-200 bg-white py-4 text-gray-500 md:py-4 px-10 z-99  top-0 left-0 sticky transition-all duration-500 ">
            <a href="{{ route('home') }}">
                <img src="{{ asset('image/logo/logo.svg') }}" alt="logo">
            </a>

            <p>Welcome, Ravi Kumar</p>

        </div>

        <div class="flex">

            @include('owner.layouts.sidebar')

            @yield('content')

        </div>
    </div>
</body>

</html>
