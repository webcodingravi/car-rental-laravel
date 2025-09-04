@extends('layouts.app')
@section('content')
    <main class="min-h-screen w-full bg-slate-100">
        <div class="w-full flex flex-col items-center justify-center py-20">
            <h1 class="font-bold text-4xl pb-2">About Us</h1>
            <span class="font-medium text-gray-600 text-sm"><a href="{{ route('home') }}">Home</a> / About Us</span>
        </div>

        <hr class="text-slate-200">
        <div class="px-6 md:px-32 grid md:grid-cols-2 grid-cols-1 gap-12 mt-13">
            <div>
                <img src="{{ asset('image/car_image1.png') }}" class="rounded-lg object-cover w-full" alt="">
            </div>

            <div class="text-slate-600 mb-8 md:mb-0">
                At CarRental, we are dedicated to simplifying your travel experience by providing reliable and convenient
                car rental solutions. Whether you're embarking on a business trip, a family vacation, or a spontaneous
                weekend getaway, our diverse fleet and exceptional customer service are here to meet your needs.
                <br /><br />

                <h2 class='text-xl font-semibold pb-2'>Our Mission</h2>

                Our mission is to deliver hassle-free mobility solutions through an easy online booking platform, a wide
                range of vehicle options, and flexible rental periods. We aim to make every journey seamless and enjoyable
                for our customers.

                <h2 class='text-xl font-semibold pt-5 pb-2'> Why Choose Us?</h2>

                Extensive Fleet: From compact cars to luxury SUVs, we offer a variety of vehicles to suit every preference
                and occasion.

                Flexible Options: Enjoy customizable rental periods and convenient pickup and drop-off locations to fit your
                schedule.

                Customer-Centric Service: Our dedicated team is committed to providing personalized support and ensuring a
                smooth rental experience.

                Transparent Pricing: We believe in clear, upfront pricing with no hidden fees, so you can plan your trip
                with confidence.

            </div>
        </div>
    </main>
@endsection
