@extends('owner.layouts.app')
@section('content')
    <div class="px-4 pt-10 md:px-10 flex-1">
        <h1 class='font-medium text-3xl'>Edit Car</h1>
        <p class='text-sm md:text-base text-gray-500/90 mt-2 max-w-156'>Edit in details to list a car for booking,
            including pricing, availability, and car specifications.</p>

        <form action="" method="post" class="flex flex-col gap-5 text-gray-500 text-sm mt-6 max-w-xl">
            {{-- {/* Car Image */} --}}
            @csrf
            <div class="flex items-center gap-2 w-full">
                <label>
                    <img src="{{ asset('image/upload.png') }}" class="h-14 rounded cursor-pointer" id="car-image" />

                    <input type="file"
                        onchange="document.querySelector('#car-image').src=window.URL.createObjectURL(this.files[0])"
                        accept="image/*" hidden />


                </label>
                <p class="text-sm text-gray-500">Upload a picture of your car</p>
            </div>

            {{-- {/* car brand & model */} --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col w-full">
                    <label>Brand</label>
                    <input type="text" placeholder="e.g. BMW, Mercedes, Audi..." required
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                </div>

                <div class="flex flex-col w-full">
                    <label>Model</label>
                    <input type="text" placeholder="e.g. X5, E-Class, M4..." required
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                </div>

            </div>

            {{-- {/* Car Year, Price, Category */} --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="flex flex-col w-full">
                    <label>Year</label>
                    <input type="number" placeholder="2025" required
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                </div>

                <div class="flex flex-col w-full">
                    <label>Daily Price ($)</label>
                    <input type="number" placeholder="100" required
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                </div>

                <div class="flex flex-col w-full">
                    <label>Category</label>
                    <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none">
                        <option value="">Select a Category</option>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="VAN">Van</option>
                    </select>
                </div>
            </div>

            {{-- {/* Car Transmission, fuel type, seating capacity */} --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="flex flex-col w-full">
                    <label>Transmission</label>
                    <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none">
                        <option value="">Select a Transmission</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Menual">Manual</option>
                        <option value="Semi-automatic">Semi-Automatic</option>
                    </select>
                </div>

                <div class="flex flex-col w-full">
                    <label>Fuel Type</label>
                    <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none">
                        <option value="">Select a fuel type</option>
                        <option value="Gas">Gas</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Electric">Electric</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>


                <div class="flex flex-col w-full">
                    <label>Seating Capacity</label>
                    <input type="number" placeholder="4" required
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                </div>

            </div>

            {{-- {/* car location */} --}}
            <div class="flex flex-col w-full">
                <label>Location</label>
                <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none">
                    <option value="">Select a Location</option>
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

            {{-- {/* Car Description */} --}}

            <div class="flex flex-col w-full">
                <label>Description</label>
                <textarea rows="5" required class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none"
                    placeholder="e.g. A luxurious SUV with a spacious interior and a powerful engine."></textarea>
            </div>

            <button
                class="flex items-center gap-2 px-4 py-2.5 mt-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md font-medium w-max cursor-pointer">
                <i class="ri-checkbox-circle-line"></i>
                Car Update
            </button>


        </form>

    </div>
@endsection
