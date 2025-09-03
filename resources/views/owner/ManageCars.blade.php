@extends('owner.layouts.app')
@section('content')
    {{-- alert message --}}
    @include('alertMessage.alertMessage')

    <div class="px-4 pt-10 md:px-10 flex-1">
        <h1 class='font-medium text-3xl'>Manage Cars</h1>
        <p class='text-sm md:text-base text-gray-500/90 mt-2 max-w-156'>View all listed cars, update their details, or remove
            them from the booking platform</p>

        <div class="max-w-3xl w-full rounded-md overflow-hidden border border-slate-200 mt-6">
            <table class="w-full border-collapse text-left text-sm text-gray-600">
                <thead class="text-gray-500">
                    <tr>
                        <th class="p-3 font-medium">Car</th>
                        <th class="p-3 font-medium max-md:hidden">Category</th>
                        <th class="p-3 font-medium">Price</th>
                        <th class="p-3 font-medium max-md:hidden">Status</th>
                        <th class="p-3 font-medium">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($cars->isNotEmpty())
                        @foreach ($cars as $car)
                            <tr class="border-t border-slate-200">
                                <td class="p-3 flex items-center gap-3">
                                    <img src="{{ asset('uploads/cars/' . $car->image) }}"
                                        class="h-12 w-12 aspect-squre rounded-md object-cover" />
                                    <div class="max-md:hidden">
                                        <p class="font-medium">{{ $car->brand }} {{ $car->model }}</p>
                                        <p class="font-medium">{{ $car->seating_capacity }} • {{ $car->transmission }}</p>
                                    </div>
                                </td>

                                <td class="p-3 max-md:hidden">SUV</td>
                                <td class="p-3">${{ $car->pricePerDay }}/day</td>

                                <td class="p-3 max-md:hidden">
                                    @if ($car->isAvailable == 1)
                                        <span class='px-3 py-1 rounded-full text-xs bg-green-100 text-green-500'>
                                            Available
                                        </span>
                                    @else
                                        <span class='px-3 py-1 rounded-full text-xs bg-rose-100 text-rose-500'>
                                            Unavailable
                                        </span>
                                    @endif

                                </td>

                                <td class="p-3 space-x-3">
                                    <button id="toggleAvailability" data-id={{ $car->id }}>
                                        <i class="ri-eye-line cursor-pointer text-md"></i>
                                    </button>
                                    <a href="{{ route('OwnerEditCar', $car->id) }}">
                                        <i class="ri-edit-box-line cursor-pointer text-md"></i>
                                    </a>
                                    <a href="{{ route('OwnerDeleteCar', $car->id) }}"
                                        onclick="return confirm('Are you sure you want to deleted?')">
                                        <i class="ri-delete-bin-6-line cursor-pointer text-md"></i>
                                        </button>

                                </td>
                            </tr>
                        @endforeach
                    @endif



                </tbody>
            </table>
            <div class="p-4">
                {{ $cars->links() }}
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>
        $("body").delegate("#toggleAvailability", "click", function() {
            const toggleIcon =
                let carId = $(this).data('id');
            $.ajax({
                url: "{{ route('toggleCarAvailability') }}",
                method: 'post',
                data: {
                    carId: carId,
                    _token: "{{ csrf_token() }}",

                },
                dataType: "json",
                success: function(res) {
                    if (res.status == true) {
                        new Swal({
                            icon: "success",
                            title: res.message
                        }).then(() => {
                            location.reload()
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
