@extends('layouts.app')
@section('content')
    <main class="mb-40">
        <div class="px-6 md:px-32 max-w-7xl mt-16 text-sm">
            <div>
                <h2 class="text-3xl md:text-[40px] font-bold">My Bookings</h2>
                <p class="max-w-2xl text-sm md:text-base text-gray-500/90 px-5 md:px-0 mt-2">View and manage your all car
                    bookings
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 p-6 border border-slate-200 rounded-lg mt-8 first:mt-12">
                <div class="md:col-span-1">
                    <div class="rounded-md overflow-hidden mb-3">
                        <img src="{{ asset('image/car_image1.png') }}" class="w-full h-auto aspect-video object-cover">
                    </div>
                    <p class="text-gray-500">Jeep Wrangler</p>
                    <p>2023 • SUV • Delhi</p>

                </div>


                {{-- booking info --}}
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2">
                        <p class="bg-slate-100 py-1.5 px-3 rounded">Booking #1</p>
                        <p class="px-3 py-1 text-xs bg-green-400/45 text-green-600 rounded-full">Confirmed</p>
                    </div>

                    <div class="flex items-start gap-2 mt-3">
                        <i class="ri-calendar-line text-xl text-blue-500"></i>
                        <div>
                            <p class="text-gray-500">Rental Period</p>
                            <p>2025-08-28 To 2025-08-30</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 mt-3">
                        <i class="ri-map-pin-line text-xl text-blue-500"></i>
                        <div>
                            <p class="text-gray-500">Pick-up Location</p>
                            <p>Delhi</p>
                        </div>
                    </div>

                </div>


                {{-- price --}}
                <div class="flex flex-col justify-between gap-6 md:col-span-1">
                    <div class="text-sm text-gray-500 text-right">
                        <p>Total Price</p>
                        <h1 class="text-2xl font-semibold text-indigo-500">$160</h1>
                        <p>Booked on 2025-08-27</p>
                    </div>
                </div>




            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 p-6 border border-slate-200 rounded-lg mt-8 first:mt-12">
                <div class="md:col-span-1">
                    <div class="rounded-md overflow-hidden mb-3">
                        <img src="{{ asset('image/car_image1.png') }}" class="w-full h-auto aspect-video object-cover">
                    </div>
                    <p class="text-gray-500">Jeep Wrangler</p>
                    <p>2023 • SUV • Delhi</p>

                </div>


                {{-- booking info --}}
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2">
                        <p class="bg-slate-100 py-1.5 px-3 rounded">Booking #1</p>
                        <p class="px-3 py-1 text-xs bg-green-400/45 text-green-600 rounded-full">Confirmed</p>
                    </div>

                    <div class="flex items-start gap-2 mt-3">
                        <i class="ri-calendar-line text-xl text-blue-500"></i>
                        <div>
                            <p class="text-gray-500">Rental Period</p>
                            <p>2025-08-28 To 2025-08-30</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 mt-3">
                        <i class="ri-map-pin-line text-xl text-blue-500"></i>
                        <div>
                            <p class="text-gray-500">Pick-up Location</p>
                            <p>Delhi</p>
                        </div>
                    </div>

                </div>


                {{-- price --}}
                <div class="flex flex-col justify-between gap-6 md:col-span-1">
                    <div class="text-sm text-gray-500 text-right">
                        <p>Total Price</p>
                        <h1 class="text-2xl font-semibold text-indigo-500">$160</h1>
                        <p>Booked on 2025-08-27</p>
                    </div>
                </div>




            </div>

        </div>
    </main>
@endsection
