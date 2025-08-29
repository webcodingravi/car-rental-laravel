@extends('owner.layouts.app')
@section('content')
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
                    <tr class="border-t border-slate-200">
                        <td class="p-3 flex items-center gap-3">
                            <img src="{{ asset('image/car_image1.png') }}"
                                class="h-12 w-12 aspect-squre rounded-md object-cover" />
                            <div class="max-md:hidden">
                                <p class="font-medium">BMW X5</p>
                                <p class="font-medium">4 • Semi-automatic</p>
                            </div>
                        </td>

                        <td class="p-3 max-md:hidden">SUV</td>
                        <td class="p-3">$2500/day</td>

                        <td class="p-3 max-md:hidden">
                            <span class='px-3 py-1 rounded-full text-xs bg-green-100 text-green-500'>
                                Avaliable
                            </span>
                        </td>

                        <td class="p-3 space-x-3">
                            <button>
                                <i class="ri-eye-line cursor-pointer text-md"></i>
                            </button>
                            <a href="{{ route('OwnerEditCar') }}">
                                <i class="ri-edit-box-line cursor-pointer text-md"></i>
                            </a>
                            <button>
                                <i class="ri-delete-bin-6-line cursor-pointer text-md"></i>
                            </button>

                        </td>
                    </tr>



                </tbody>
            </table>

        </div>


    </div>
@endsection
