@extends('layouts.app')
@section('content')
    <main>
        <div class="px-6 md:px-32 mt-16">
            <a href="{{ route('cars') }}" class="flex items-center cursor-pointer gap-2 text-gray-500 mb-6">
                <i class="ri-arrow-left-line"></i>
                Back to all cars
            </a>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 mb-50">
                {{-- left side --}}
                <div class="md:col-span-2">
                    <img src="{{ asset('image/car_image1.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-xl mb-6 shadow-md md:max-h-120">

                    <div>
                        <h1 class="text-3xl font-bold">{{ $carDetail->brand }} {{ $carDetail->model }}</h1>
                        <p class="text-gray-500 text-lg">{{ $carDetail->category }} • {{ $carDetail->year }}</p>
                    </div>
                    <hr class="border border-gray-100 my-6" />
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="flex flex-col items-center bg-slate-100 p-4 rounded-lg">
                            <i class="ri-group-line text-xl text-slate-600"></i>
                            <span class="text-slate-600">{{ $carDetail->seating_capacity }} Seats</span>
                        </div>

                        <div class="flex flex-col items-center bg-slate-100 p-4 rounded-lg">
                            <i class="ri-charging-pile-line text-xl text-slate-600"></i>
                            <span class="text-slate-600">{{ $carDetail->fuel_type }}</span>
                        </div>

                        <div class="flex flex-col items-center bg-slate-100 p-4 rounded-lg">
                            <i class="ri-roadster-fill text-xl text-slate-600"></i>
                            <span class="text-slate-600">{{ $carDetail->transmission }}</span>

                        </div>


                        <div class="flex flex-col items-center bg-slate-100 p-4 rounded-lg">
                            <i class="ri-map-pin-line text-xl text-slate-600"></i>
                            <span class="text-slate-600">{{ $carDetail->location }}</span>
                        </div>

                    </div>


                    {{-- description --}}
                    <div class="pt-10">
                        <h1 class="text-xl font-medium mb-3">Description</h1>
                        <p class="text-gray-500">{{ $carDetail->description }}</p>
                    </div>

                    {{-- Features --}}

                    <div class="pt-10">
                        <h1 class="font-medium text-xl mb-3">Features</h1>
                        <ul class="grid md:grid-cols-2 gap-2 grid-cols-1">
                            <li class="flex items-center text-gray-500">
                                <i class="ri-arrow-right-circle-line mr-2 text-xl text-blue-500"></i>
                                360 Camera

                            </li>

                            <li class="flex items-center text-gray-500">
                                <i class="ri-arrow-right-circle-line mr-2 text-xl text-blue-500"></i>
                                Bluetooth

                            </li>

                            <li class="flex items-center text-gray-500">
                                <i class="ri-arrow-right-circle-line mr-2 text-xl text-blue-500"></i>
                                GPS

                            </li>

                            <li class="flex items-center text-gray-500">
                                <i class="ri-arrow-right-circle-line mr-2 text-xl text-blue-500"></i>
                                Heated Seats

                            </li>

                            <li class="flex items-center text-gray-500">
                                <i class="ri-arrow-right-circle-line mr-2 text-xl text-blue-500"></i>
                                Rear View

                            </li>

                            <li class="flex items-center text-gray-500">
                                <i class="ri-arrow-right-circle-line mr-2 text-xl text-blue-500"></i>
                                Mirror

                            </li>


                        </ul>
                    </div>
                </div>

                {{-- right side --}}

                <form id="booking" method="post">
                    @csrf
                    <div class="h-max shadow-lg sticky top-0 left-0 rounded-xl p-6 text-gray-500 space-y-6">
                        <p class="flex items-center justify-between text-2xl text-gray-800 font-semibold" id="price">
                            ${{ $carDetail->pricePerDay }} <span class="text-base font-normal text-gray-400">per day</span>
                        </p>
                        <hr class="border border-slate-200 my-6" />
                        <input type="text" name="car_id" value="{{ $carDetail->id }}" hidden
                            class="border border-slate-200 px-3 py-2 rounded-lg focus:outline-none">
                        <div class="flex flex-col gap-2">
                            <label>Pickup Date</label>
                            <input type="date" name="pickupDate"
                                class="border border-slate-200 px-3 py-2 rounded-lg focus:outline-none">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label>Return Date</label>
                            <input type="date" name="returnDate"
                                class="border border-slate-200 px-3 py-2 rounded-lg focus:outline-none">
                        </div>

                        <button
                            class="bg-indigo-500 cursor-pointer w-full text-white rounded-xl font-medium py-3 hover:bg-indigo-600">Book
                            Now</button>

                        <p class="text-center text-sm">No credit card required to reserve</p>


                    </div>
                </form>

            </div>
        </div>

    </main>
@endsection

@section('script')
    <script>
        $('body').delegate("#booking", "submit", function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ route('createBooking') }}",
                method: "post",
                data: $(this).serialize(),
                dataType: "json",
                success: function(res) {
                    if (res.status == true) {
                        new Swal({
                            icon: 'success',
                            title: res.message
                        }).then(() => {
                            location.reload();
                        })

                    } else {
                        new Swal({
                            icon: 'error',
                            title: res.message
                        }).then(() => {
                            location.reload();
                        })
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error', textStatus, errorThrown);
                    alert('An error occurred:' + errorThrown)
                }

            })
        })
    </script>
@endsection
