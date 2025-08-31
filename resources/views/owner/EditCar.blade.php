@extends('owner.layouts.app')
@section('content')
    {{-- alert message --}}
    @include('alertMessage.alertMessage')

    <div class="px-4 pt-10 md:px-10 flex-1">
        <h1 class='font-medium text-3xl'>Edit Car</h1>
        <p class='text-sm md:text-base text-gray-500/90 mt-2 max-w-156'>Edit in details to list a car for booking,
            including pricing, availability, and car specifications.</p>

        <form action="{{ route('OwnerUpdateCar', $car->id) }}" method="post" enctype="multipart/form-data"
            class="flex flex-col gap-5 text-gray-500 text-sm mt-6 max-w-xl">
            {{-- {/* Car Image */} --}}
            @csrf
            @method('put')
            @if (!empty($car->image))
                <div class="flex items-center gap-2 w-full">
                    <label>
                        <img src="{{ asset('uploads/cars/' . $car->image) }}" class="h-14 rounded cursor-pointer"
                            id="car-image" />

                        <input type="file" name="image"
                            onchange="document.querySelector('#car-image').src=window.URL.createObjectURL(this.files[0])"
                            accept="image/*" hidden />


                    </label>
                    <p class="text-sm text-gray-500">Upload a picture of your car</p>
                </div>
            @endif

            {{-- {/* car brand & model */} --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col w-full">
                    <label>Brand</label>
                    <input type="text" value="{{ old('brand', $car->brand) }}" name="brand"
                        placeholder="e.g. BMW, Mercedes, Audi..."
                        class="px-3 py-2 mt-1 border  border-slate-200 rounded-md outline-none" />
                    @error('brand')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex
                        flex-col w-full">
                    <label>Model</label>
                    <input type="text" value="{{ old('model', $car->model) }}" name="model"
                        placeholder="e.g. X5, E-Class, M4..."
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                    @error('model')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- {/* Car Year, Price, Category */} --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="flex flex-col w-full">
                    <label>Year</label>
                    <input type="number" value="{{ old('year', $car->year) }}" name="year" placeholder="2025"
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                    @error('year')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label>Daily Price ($)</label>
                    <input type="number" value="{{ old('pricePerDay', $car->pricePerDay) }}" name="pricePerDay"
                        placeholder="100" class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" />
                    @error('pricePerDay')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label>Category</label>
                    <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none" name="category">
                        <option value="">Select a Category</option>
                        <option value="Sedan" {{ $car->category == 'sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="SUV" {{ $car->category == 'SUV' ? 'selected' : '' }}>SUV</option>
                        <option value="VAN" {{ $car->category == 'VAN' ? 'selected' : '' }}>Van</option>
                    </select>
                    @error('category')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- {/* Car Transmission, fuel type, seating capacity */} --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="flex flex-col w-full">
                    <label>Transmission</label>
                    <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none" name="transmission">
                        <option value="">Select a Transmission
                        </option>
                        <option value="Automatic" {{ $car->transmission == 'Automatic' ? 'selected' : '' }}>Automatic
                        </option>
                        <option value="Menual" {{ $car->transmission == 'Menual' ? 'selected' : '' }}>Manual</option>
                        <option value="Semi-automatic" {{ $car->transmission == 'Semi-automatic' ? 'selected' : '' }}>
                            Semi-Automatic</option>
                    </select>
                    @error('transmission')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label>Fuel Type</label>
                    <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none" name="fuel_type">
                        <option value="">Select a fuel type</option>
                        <option value="Gas" {{ $car->fuel_type == 'Gas' ? 'selected' : '' }}>Gas</option>
                        <option value="Diesel" {{ $car->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="Petrol" {{ $car->fuel_type == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                        <option value="Electric" {{ $car->fuel_type == 'Electric' ? 'selected' : '' }}>Electric</option>
                        <option value="Hybrid" {{ $car->fuel_type == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                    @error('fuel_type')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex flex-col w-full">
                    <label>Seating Capacity</label>
                    <input type="number" placeholder="4" name="seating_capacity"
                        class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none"
                        value="{{ old('seating_capacity', $car->seating_capacity) }}" />

                    @error('seating_capacity')
                        <p class="text-pink-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- {/* car location */} --}}
            <div class="flex flex-col w-full">
                <label>Location</label>
                <select class="px-3 py-2 mt-1 border border-slate-200 focus:outline-none" name="location">
                    <option value="">Select a Location</option>
                    <option value="Uttar Pardesh" {{ $car->location == 'Uttar Pardesh' ? 'selected' : '' }}>Uttar Pardesh
                    </option>
                    <option value="Delhi" {{ $car->location == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                    <option value="Mumbai" {{ $car->location == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                    <option value="Bhair" {{ $car->location == 'Bhair' ? 'selected' : '' }}>Bhair</option>
                    <option value="Haryana" {{ $car->location == 'Haryana' ? 'selected' : '' }}>Haryana</option>
                    <option value="Kolkata" {{ $car->location == 'Kolkata' ? 'selected' : '' }}>Kolkata</option>
                    <option value="chandigarh" {{ $car->location == 'chandigarh' ? 'selected' : '' }}>chandigarh
                    </option>
                    <option value="Bhopal" {{ $car->location == 'Bhopal' ? 'selected' : '' }}>Bhopal</option>
                </select>
                @error('location')
                    <p class="text-pink-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- {/* Car Description */} --}}

            <div class="flex flex-col w-full">
                <label>Description</label>
                <textarea rows="5" class="px-3 py-2 mt-1 border border-slate-200 rounded-md outline-none" name="description"
                    placeholder="e.g. A luxurious SUV with a spacious interior and a powerful engine.">{{ old('description', $car->description) }}</textarea>
            </div>

            <button
                class="flex items-center gap-2 px-4 py-2.5 mt-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md font-medium w-max cursor-pointer">
                <i class="ri-checkbox-circle-line"></i>
                Update Your Car
            </button>


        </form>

    </div>
@endsection
