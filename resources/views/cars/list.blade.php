@if ($cars->isNotEmpty())
    @foreach ($cars as $car)
        <a href="{{ route('CarDetail', $car->uuid) }}">
            <div
                class="shadow-lg rounded-xl overflow-hidden group hover:-translate-y-1 transition-all duration-500 cursor-pointer">

                <div class="relative overflow-hidden h-48">
                    <img src="{{ asset('uploads/cars/' . $car->image) }}" alt="car image"
                        class="w-full h-full object-cover transition-transform group-hover:scale-105" />

                    @if (!empty($car->isAvailable))
                        <p class="absolute top-4 left-4 bg-indigo-500 text-white text-xs px-2.5 py-1 rounded-full">
                            Available Now</p>
                    @endif

                    <div class="px-3 py-2 rounded-lg text-white absolute right-4 bottom-4 bg-black/40 backdrop-blur-sm">
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
@endif
