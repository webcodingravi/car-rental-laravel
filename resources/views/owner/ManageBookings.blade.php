@extends('owner.layouts.app')
@section('content')
    {{-- alert message --}}
    @include('alertMessage.alertMessage')

    <div class="px-4 pt-10 md:px-10 flex-1">
        <h1 class='font-medium text-3xl'>Manage Bookings</h1>
        <p class='text-sm md:text-base text-gray-500/90 mt-2 max-w-156'>Track all customer bookings, approve or cancel
            requests, and manage booking statuses.</p>


        <div class="max-w-3xl w-full rounded-md overflow-hidden border border-slate-200 mt-6">
            <table class="w-full border-collapse text-left text-sm text-gray-600">
                <thead class="text-gray-500">
                    <tr>
                        <th class="p-3 font-medium">Car</th>
                        <th class="p-3 font-medium max-md:hidden">Date Range</th>
                        <th class="p-3 font-medium">Total</th>
                        <th class="p-3 font-medium max-md:hidden">Payment</th>
                        <th class="p-3 font-medium">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($bookings->isNotEmpty())
                        @foreach ($bookings as $booking)
                            <tr class="border-t border-slate-200 text-gray-500">
                                <td class='p-3 flex items-center gap-3'>
                                    <img src="{{ asset('image/car_image1.png') }}"
                                        class='h-12 w-12 aspect-square rounded-md object-cover' />
                                    <p class='font-medium max-md:hidden'>{{ $booking->car->brand }}
                                        {{ $booking->car->model }}</p>
                                </td>

                                <td class='p-3 max-md:hidden'>
                                    {{ $booking->pickupDate }} to {{ $booking->returnDate }}
                                </td>

                                <td class='p-3 max-md:hidden'>
                                    ${{ $booking->price }}
                                </td>

                                <td class='p-3 max-md:hidden'>
                                    <span class='bg-gray-100 px-3 py-1 rounded-full text-xs'>offline</span>
                                </td>

                                <td class='p-3'>
                                    <select
                                        class='px-2 py-1.5 mt-1 text-gray-500 border border-slate-200 rounded-md outline-none'>
                                        <option value="pending" {{ $booking->returnDate == 'pending' ? 'pending' : '' }}>
                                            Pending</option>
                                        <option value="cancelled"
                                            {{ $booking->returnDate == 'cancelled' ? 'cancelled' : '' }}>Cancelled</option>
                                        <option value="confirmed"
                                            {{ $booking->returnDate == 'confirmed' ? 'confirmed' : '' }}>Confirmed</option>
                                    </select>


                                </td>

                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

        </div>
    </div>
@endsection
