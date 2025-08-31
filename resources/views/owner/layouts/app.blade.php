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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    @vite('resources/css/app.css')

</head>

<body>

    <div class="flex flex-col">
        <div
            class="flex items-center justify-between border-b border-slate-200 bg-white py-4 text-gray-500 md:py-4 md:px-10 px-4 z-99  top-0 left-0 sticky transition-all duration-500 ">
            <a href="{{ route('home') }}">
                <img src="{{ asset('image/logo/logo.svg') }}" alt="logo">
            </a>


            @if (!empty(Auth::user()->name))
                <p>Welcome, {{ Auth::user()->name }}</p>
            @endif

        </div>

        <div class="flex">

            @include('owner.layouts.sidebar', ['profilePic', 'updateProfile'])

            @yield('content')

        </div>
    </div>
    @yield('script')
    <script>
        setTimeout(() => {
            $("#box").fadeOut('slow')
        }, 3000);
    </script>
</body>

</html>
