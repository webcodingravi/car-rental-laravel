@extends('layouts.app')
@section('content')
    <main>
        <section
            class="hero overflow-hidden bg-slate-100 w-full flex flex-col gap-12 justify-center md:items-center min-h-screen p-7 md:p-0">
            <h1 class="text-5xl font-bold animate__animated animate__backInDown">Luxury cars on Rent</h1>
            <form action="{{ route('cars') }}" method="get">
                <div
                    class="flex flex-col md:flex-row gap-9 md:items-center items-start bg-white px-12 py-6 text-slate-700 md:rounded-full rounded-xl text-center animate__animated animate__backInDown">
                    <div class="flex flex-col gap-1 items-start">
                        <label>Pickup Location</label>
                        <select name="location" class="focus:outline-none bg-slate-100">
                            <option value="">Select Location</option>
                            <option value="Uttar Pardesh">Uttar Pardesh</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Bhair">Bhair</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Kolkata">Kolkata</option>
                            <option value="chandigarh">chandigarh</option>
                            <option value="Bhopal">Bhopal</option>
                        </select>

                    </div>

                    <div class="flex flex-col gap-1 items-start">
                        <label>Pickup Date</label>
                        <input type="date" name="pickupDate" class="focus:outline-none">

                    </div>

                    <div class="flex flex-col gap-1 items-start">
                        <label>Return Date</label>
                        <input type="date" name="returnDate" class="focus:outline-none">
                    </div>

                    <div class="">
                        <button type="submit"
                            class="bg-indigo-500 px-8 rounded-full text-white hover:bg-indigo-600 py-3 cursor-pointer transition-all duration-200">
                            <i class="ri-search-line mr-2"></i>
                            Search
                        </button>
                    </div>

                </div>

            </form>

            <img src="{{ asset('image/main_car.png') }}" class="md:h-85 h-35 animate__animated animate__backInRight"
                alt="">
            </div>
        </section>


        {{-- Featured Vehicles Section --}}
        @if ($featuresCars->isNotEmpty())
            <section class="py-28">
                <div class="flex flex-col gap-3 items-center text-center">
                    <h2 class="text-3xl md:text-[40px] font-bold">Featured Vehicles</h2>
                    <p class="max-w-2xl text-sm md:text-base text-gray-500/90 px-5 md:px-0">Explore our selection of
                        premium
                        vehicles
                        available for your next adventure.</p>
                </div>

                <div class="grid md:grid-cols-4 grid-cols-1 gap-8 md:px-32 p-6 mt-8">

                    @foreach ($featuresCars as $car)
                        <a href="{{ route('CarDetail', $car->uuid) }}">
                            <div
                                class="shadow-lg rounded-xl overflow-hidden group hover:-translate-y-1 transition-all duration-500 cursor-pointer">

                                <div class="relative overflow-hidden h-48">
                                    <img src="{{ asset('uploads/cars/' . $car->image) }}" alt="car image"
                                        class="w-full h-full object-cover transition-transform group-hover:scale-105" />

                                    @if (!empty($car->isAvailable))
                                        <p
                                            class="absolute top-4 left-4 bg-indigo-500 text-white text-xs px-2.5 py-1 rounded-full">
                                            Available Now</p>
                                    @endif

                                    <div
                                        class="px-3 py-2 rounded-lg text-white absolute right-4 bottom-4 bg-black/40 backdrop-blur-sm">
                                        <span class="font-semibold">₹{{ number_format($car->pricePerDay) }}</span>
                                        <span class="font-semibold text-white/80 text-sm">/day</span>
                                    </div>
                                </div>

                                <div class="p-4 sm:p-5">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>

                                            <h3 class="text-lg font-medium">{{ $car->brand }} {{ $car->model }}</h3>
                                            <p class="text-sm text-muted-forground">{{ $car->category }} •
                                                {{ $car->year }}</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 mt-4 gap-y-2 text-gray-600">
                                        <div class="flex items-center text-md text-muted-forground">
                                            <i class="ri-group-line mr-1 font-medium text-md"></i>
                                            <span>{{ $car->seating_capacity }} Seats</span>
                                        </div>

                                        <div class="flex items-center text-md text-muted-forground">
                                            <i class="ri-charging-pile-line mr-1 font-medium text-md"></i>
                                            <span>{{ $car->fuel_type }}</span>
                                        </div>

                                        <div class="flex items-center text-md text-muted-forground">
                                            <i class="ri-roadster-fill mr-1 font-medium text-md"></i>
                                            <span>{{ $car->transmission }}</span>
                                        </div>

                                        <div class="flex items-center text-md text-muted-forground">
                                            <i class="ri-map-pin-line mr-1 font-medium text-md"></i>
                                            <span>{{ $car->location }}</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>

                <div class="flex justify-center">
                    <a href="{{ route('cars') }}"
                        class="w-fit gap-2 px-6 py-2 border border-slate-200 hover:bg-gray-50 rounded-md mt-18 cursor-pointer">Explore
                        All Cars <i class="ri-arrow-right-line"></i></a>
                </div>

            </section>
        @endif

        {{-- Banner section --}}
        <section
            class="banner bg-gradient-to-r from-[#615fff] to [#A9CFFF]  rounded-2xl overflow-hidden flex flex-col md:flex-row md:items-start items-center justify-between  pt-10 mx-6 md:mx-32 px-8 ">
            <div class="text-white animate__animated animate__backInDown">
                <h2 class="text-3xl font-medium">Do You Own a Luxury Car?</h2>
                <p class="mt-2">Mentize your vehicle effortlessly by listing it on CarRental.</p>
                <p class='mb-9'>We take care of insurance, driver verification and secure payments - so you can
                    earn passive income, stress-free</p>

                <a href="#"
                    class="cursor-ponter bg-indigo-600 px-5 py-2.5 rounded-md shadow-2xl hover:bg-indigo-700 duration-200">List
                    Your
                    Car <i class="ri-arrow-right-line"></i></a>

            </div>

            <img src="{{ asset('image/banner_car_image.png') }}" class="mt-10 animate__animated animate__backInRight"
                alt="car">

        </section>


        {{-- Testimonials --}}
        <section class="testimonials md:py-28 py-20">
            <div class="flex flex-col gap-3 items-center text-center">
                <h2 class="text-3xl md:text-[40px] font-bold px-5 md:px-0">What Our Customers Say</h2>
                <p class="max-w-2xl text-sm md:text-base text-gray-500/90">Discover why discerning travelers
                    choose StayVenture for their luxury accommodations around the world.</p>
            </div>

            <div class="grid md:grid-cols-4 grid-cols-1 gap-12 mt-18 md:px-32 px-6">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:-translate-y-1 transition-all duration-500">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('image/testimonial-2.jpg') }}" class="h-12 w-12 rounded-full" />
                        <div class="flex flex-col items-start">
                            <p class="text-xl">Shrikant Kanitkar</p>
                            <p class="text-gray-500 text-sm">Delhi</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 mt-4">
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>



                    <p class="text-gray-500 max-w-90 mt-4 font-light">I highly recommend CarRental! Their
                        fleet is
                        amazing, and I always feel like I'm getting the best
                        deal with excellent service.</p>
                </div>


                <div class="bg-white p-6 rounded-xl shadow-lg hover:-translate-y-1 transition-all duration-500">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('image/testimonial_image_1.png') }}" class="h-12 w-12 rounded-full" />
                        <div class="flex flex-col items-start">
                            <p class="text-xl">Kajal Kumari</p>
                            <p class="text-gray-500 text-sm">New Delhi</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 mt-4">
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>

                    <p class="text-gray-500 max-w-90 mt-4 font-light">I had a wonderful experience booking a car rental in
                        Bangalore with Savaari what stood out the most was the excellent customer care team.</p>
                </div>


                <div class="bg-white p-6 rounded-xl shadow-lg hover:-translate-y-1 transition-all duration-500">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('image/testimonial-3.jpg') }}" class="h-12 w-12 rounded-full" />
                        <div class="flex flex-col items-start">
                            <p class="text-xl">Nareshkumar Choudekar</p>
                            <p class="text-gray-500 text-sm">Delhi</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 mt-4">
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 max-w-90 mt-4 font-light">CarRental made my trip so much easier. The car was
                        delivered right to my door, and the customer service was fantastic!</p>
                </div>


                <div class="bg-white p-6 rounded-xl shadow-lg hover:-translate-y-1 transition-all duration-500">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('image/testimonial-4.jpg') }}" class="h-12 w-12 rounded-full" />
                        <div class="flex flex-col items-start">
                            <p class="text-xl">Subhasis Sen</p>
                            <p class="text-gray-500 text-sm">Bangalore</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 mt-4">
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 max-w-90 mt-4 font-light">I've rented cars from various companies, but the
                        experience with CarRental was exceptional.</p>
                </div>

            </div>



        </section>

        {{-- Newslater --}}
        <section class="newslater md:py-14">
            <div class="flex flex-col items-center justify-center text-center space-y-2 my-10 mb-40 max-md:px-4">
                <h1 class="text-2xl font-bold md:text-4xl">Never Miss a Deal !</h1>
                <p class="text-gray-500/70 pb-8 md:text-lg"> Subscribe to get the latest offers, new arrivals, and
                    exclusive discounts</p>
                <form action="" method="post"
                    class="flex items-center justify-between w-full h-12 md:h-13 max-w-4xl">
                    <input type="text"
                        class="border border-gray-300 rounded-md h-full outline-none border-r-none px-3 text-gray-500 w-full"
                        placeholder="Enter Your Email Id" Required />

                    <button
                        class="px-8 md:px-12 text-white bg-indigo-500 hover:bg-indigo-600 cursor-pointer h-full transition-all duration-200">Subscribe</button>
                </form>

            </div>

        </section>

    </main>
@endsection
