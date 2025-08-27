@extends('layouts.app')
@section('content')
    <main>
        <div class="flex flex-col gap-3 items-center text-center py-20 bg-slate-100">
            <h2 class="text-3xl md:text-[40px] font-bold">Available Cars</h2>
            <p class="max-w-2xl text-sm md:text-base text-gray-500/90 px-5 md:px-0">Browse our selection of premium
                vehicles available for your next adventure</p>

            <div class="flex items-center bg-white rounded-full shadow px-4 h-12 max-w-140 w-full mt-4">
                <i class="ri-search-line text-xl px-2 text-gray-500"></i>
                <input type="text" placeholder="Search by make, model, or features"
                    class="w-full h-full outline-none text-gray-500">
                <i class="ri-filter-line text-xl px-2 text-gray-500"></i>
            </div>

        </div>


        <div class="mb-50">
            <div class="px-6 md:px-32 mt-10">
                <p class="text-gray-500 max-w-8xl">Showing 0 Cars</p>
            </div>

            <div class="grid md:grid-cols-4 grid-cols-1 gap-8 md:px-32 p-6">
                <a href="{{ route('CarDetail') }}">
                    <div
                        class="shadow-lg rounded-xl overflow-hidden group hover:-translate-y-1 transition-all duration-500 cursor-pointer">

                        <div class="relative overflow-hidden h-48">
                            <img src="{{ asset('image/car_image1.png') }}" alt="car image"
                                class="w-full h-full object-cover transition-transform group-hover:scale-105" />
                            <p class="absolute top-4 left-4 bg-indigo-500 text-white text-xs px-2.5 py-1 rounded-full">
                                Available Now</p>

                            <div
                                class="px-3 py-2 rounded-lg text-white absolute right-4 bottom-4 bg-black/40 backdrop-blur-sm">
                                <span class="font-semibold">$160</span>
                                <span class="font-semibold text-white/80 text-sm">/day</span>
                            </div>
                        </div>

                        <div class="p-4 sm:p-5">
                            <div class="flex justify-between items-start mb-2">
                                <div>

                                    <h3 class="text-lg font-medium">BMW X5</h3>
                                    <p class="text-sm text-muted-forground">SUV • 2006</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 mt-4 gap-y-2 text-gray-600">
                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-group-line mr-1 font-medium text-md"></i>
                                    <span>Seats</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-charging-pile-line mr-1 font-medium text-md"></i>
                                    <span>Hybrid</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-roadster-fill mr-1 font-medium text-md"></i>
                                    <span>Semi-Automatic</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-map-pin-line mr-1 font-medium text-md"></i>
                                    <span>Delhi</span>
                                </div>


                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('CarDetail') }}">
                    <div
                        class="shadow-lg rounded-xl overflow-hidden group hover:-translate-y-1 transition-all duration-500 cursor-pointer">

                        <div class="relative overflow-hidden h-48">
                            <img src="{{ asset('image/car_image1.png') }}" alt="car image"
                                class="w-full h-full object-cover transition-transform group-hover:scale-105" />
                            <p class="absolute top-4 left-4 bg-indigo-500 text-white text-xs px-2.5 py-1 rounded-full">
                                Available Now</p>

                            <div
                                class="px-3 py-2 rounded-lg text-white absolute right-4 bottom-4 bg-black/40 backdrop-blur-sm">
                                <span class="font-semibold">$160</span>
                                <span class="font-semibold text-white/80 text-sm">/day</span>
                            </div>
                        </div>

                        <div class="p-4 sm:p-5">
                            <div class="flex justify-between items-start mb-2">
                                <div>

                                    <h3 class="text-lg font-medium">BMW X5</h3>
                                    <p class="text-sm text-muted-forground">SUV • 2006</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 mt-4 gap-y-2 text-gray-600">
                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-group-line mr-1 font-medium text-md"></i>
                                    <span>Seats</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-charging-pile-line mr-1 font-medium text-md"></i>
                                    <span>Hybrid</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-roadster-fill mr-1 font-medium text-md"></i>
                                    <span>Semi-Automatic</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-map-pin-line mr-1 font-medium text-md"></i>
                                    <span>Delhi</span>
                                </div>


                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('CarDetail') }}">
                    <div
                        class="shadow-lg rounded-xl overflow-hidden group hover:-translate-y-1 transition-all duration-500 cursor-pointer">

                        <div class="relative overflow-hidden h-48">
                            <img src="{{ asset('image/car_image1.png') }}" alt="car image"
                                class="w-full h-full object-cover transition-transform group-hover:scale-105" />
                            <p class="absolute top-4 left-4 bg-indigo-500 text-white text-xs px-2.5 py-1 rounded-full">
                                Available Now</p>

                            <div
                                class="px-3 py-2 rounded-lg text-white absolute right-4 bottom-4 bg-black/40 backdrop-blur-sm">
                                <span class="font-semibold">$160</span>
                                <span class="font-semibold text-white/80 text-sm">/day</span>
                            </div>
                        </div>

                        <div class="p-4 sm:p-5">
                            <div class="flex justify-between items-start mb-2">
                                <div>

                                    <h3 class="text-lg font-medium">BMW X5</h3>
                                    <p class="text-sm text-muted-forground">SUV • 2006</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 mt-4 gap-y-2 text-gray-600">
                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-group-line mr-1 font-medium text-md"></i>
                                    <span>Seats</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-charging-pile-line mr-1 font-medium text-md"></i>
                                    <span>Hybrid</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-roadster-fill mr-1 font-medium text-md"></i>
                                    <span>Semi-Automatic</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-map-pin-line mr-1 font-medium text-md"></i>
                                    <span>Delhi</span>
                                </div>


                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('CarDetail') }}">
                    <div
                        class="shadow-lg rounded-xl overflow-hidden group hover:-translate-y-1 transition-all duration-500 cursor-pointer">

                        <div class="relative overflow-hidden h-48">
                            <img src="{{ asset('image/car_image1.png') }}" alt="car image"
                                class="w-full h-full object-cover transition-transform group-hover:scale-105" />
                            <p class="absolute top-4 left-4 bg-indigo-500 text-white text-xs px-2.5 py-1 rounded-full">
                                Available Now</p>

                            <div
                                class="px-3 py-2 rounded-lg text-white absolute right-4 bottom-4 bg-black/40 backdrop-blur-sm">
                                <span class="font-semibold">$160</span>
                                <span class="font-semibold text-white/80 text-sm">/day</span>
                            </div>
                        </div>

                        <div class="p-4 sm:p-5">
                            <div class="flex justify-between items-start mb-2">
                                <div>

                                    <h3 class="text-lg font-medium">BMW X5</h3>
                                    <p class="text-sm text-muted-forground">SUV • 2006</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 mt-4 gap-y-2 text-gray-600">
                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-group-line mr-1 font-medium text-md"></i>
                                    <span>Seats</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-charging-pile-line mr-1 font-medium text-md"></i>
                                    <span>Hybrid</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-roadster-fill mr-1 font-medium text-md"></i>
                                    <span>Semi-Automatic</span>
                                </div>

                                <div class="flex items-center text-md text-muted-forground">
                                    <i class="ri-map-pin-line mr-1 font-medium text-md"></i>
                                    <span>Delhi</span>
                                </div>


                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>


    </main>
@endsection
