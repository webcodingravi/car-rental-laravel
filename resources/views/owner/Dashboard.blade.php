@extends('owner.layouts.app')
@section('content')
    <div class="px-4 pt-10 md:px-10 flex-1">
        <h1 class='font-medium text-3xl'>Admin Dashboard</h1>
        <p class='text-sm md:text-base text-gray-500/90 mt-2 max-w-156'>Monitor overall platform performance
            including total cars, bookings, revenue, and recent activites</p>

        <div class='grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 my-8 max-w-3xl'>
            <div class='flex gap-2 items-center justify-between p-4 rounded-md border border-slate-200'>
                <div>
                    <h1 class='text-xs text-gray-500'>Total Cars</h1>
                    <p class='text-lg font-semibold'>4</p>
                </div>
                <div class='flex items-center justify-center w-10 h-10 rounded full bg-indigo-500/10'>
                    <i class="ri-car-line text-xl text-indigo-600"></i>
                </div>
            </div>

            <div class='flex gap-2 items-center justify-between p-4 rounded-md border border-slate-200'>
                <div>
                    <h1 class='text-xs text-gray-500'>Total Bookings</h1>
                    <p class='text-lg font-semibold'>0</p>
                </div>
                <div class='flex items-center justify-center w-10 h-10 rounded full bg-indigo-500/10'>
                    <i class="ri-survey-line text-xl text-indigo-600"></i>


                </div>
            </div>


            <div class='flex gap-2 items-center justify-between p-4 rounded-md border border-slate-200'>
                <div>
                    <h1 class='text-xs text-gray-500'>Pending</h1>
                    <p class='text-lg font-semibold'>0</p>
                </div>
                <div class='flex items-center justify-center w-10 h-10 rounded full bg-indigo-500/10'>
                    <i class="ri-alert-line text-xl text-indigo-600"></i>

                </div>
            </div>


            <div class='flex gap-2 items-center justify-between p-4 rounded-md border border-slate-200'>
                <div>
                    <h1 class='text-xs text-gray-500'>Confirmed</h1>
                    <p class='text-lg font-semibold'>0</p>
                </div>
                <div class='flex items-center justify-center w-10 h-10 rounded full bg-indigo-500/10'>
                    <i class="ri-checkbox-circle-line text-xl text-indigo-600"></i>

                </div>
            </div>
        </div>
        <div class='flex flex-wrap items-start gap-6 mb-8 w-full'>
            {{-- {/* recent booking */} --}}
            <div class='p-4 md:p-6 border border-slate-200 rounded-md max-w-lg w-full'>
                <h1 class='text-lg font-medium'>Recent Bookings</h1>
                <p class='text-gray-500'>Latest customer bookings</p>
                <div class='mt-4 flex items-center justify-between'>
                    <div class='flex items-center gap-2'>
                        <div class='hidden md:flex items-center justify-center w-12 h-12 rounded-full bg-indigo-500/10'>
                            <i class="ri-survey-line text-xl text-indigo-600"></i>
                        </div>
                        <div>
                            <p>Jeep Wrangler</p>
                            <p class='text-sm text-gray-500'>2025-08-27</p>
                        </div>
                    </div>

                    <div class='flex items-center gap-2 font-medium'>
                        <p class='text-sm text-gray-500'>$160</p>
                        <p class='px-3 py-0.5 border border-slate-200 rounded-full text-sm'>pending</p>
                    </div>
                </div>

            </div>

            {{-- {/* monthly revenue */} --}}
            <div class='p-4 md:p-6 mb-6 border border-slate-200 rounded-md w-full md:max-w-xs'>
                <h1 class='text-lg font-medium'>Monthly Revenue</h1>
                <p class='text-gray-500'>Revenue for current month</p>
                <p class='text-3xl mt-6 font-semibold text-indigo-500'>$0</p>
            </div>
        </div>

    </div>
@endsection
