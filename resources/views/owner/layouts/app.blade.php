<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner</title>
    <link rel="icon" href="{{ asset('image/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @vite('resources/css/app.css')
</head>

<body>
    {{-- @include('owner.layouts.header')

    @include('owner.layouts.sidebar') --}}

    <div
        class="flex items-center justify-between border-b border-slate-200 bg-white py-4 text-gray-500 md:py-4 px-10 z-99  top-0 left-0 sticky transition-all duration-500 ">
        <a href="{{ route('home') }}">
            <img src="{{ asset('image/logo/logo.svg') }}" alt="logo">
        </a>

        <p>Welcome, Ravi Kumar</p>

    </div>

    <div
        class="relative min-h-screen md:flex flex-col items-center pt-8 max-w-13 md:max-w-60 w-full border-r border-slate-200 text-sm">
        <div class="group relative">

        </div>

    </div>


</body>

</html>
