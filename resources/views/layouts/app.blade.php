<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Rental</title>
    <link rel="icon" href="{{ asset('image/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css">
    @vite('resources/css/app.css')
</head>

<body>
    @include('layouts.header')

    @yield('content')

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="{{ asset('js/common.js') }}"></script>
</body>

</html>
