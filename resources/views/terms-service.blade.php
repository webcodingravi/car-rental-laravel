@extends('layouts.app')
@section('content')
    <main class="min-h-screen w-full bg-slate-100">
        <div class="w-full flex flex-col items-center justify-center py-20">
            <h1 class="font-bold text-4xl pb-2">Terms of Service</h1>
            <span class="font-medium text-gray-600 text-sm"><a href="{{ route('home') }}">Home</a> / Terms of Service</span>
        </div>

        <hr class="text-slate-200">
        <div class="px-6 md:px-32 mt-13 pb-8 md:pb-0">
            <div class="text-slate-600">
                By using the CarRental service, you agree to comply with the following terms: rentals are strictly for
                drivers holding valid licenses and may not be assigned, sub-let, or used for unauthorized purposes such as
                racing, towing, carrying hazardous materials, or operating under the influence of alcohol or drugs, similar
                to terms outlined by Goicar and Wanderides in their service agreements.
                <br /><br>
                be used within prescribed speed limits, and any fines related to traffic violations, tolls, interstate
                permits, or parking—plus administrative fees—are the renter’s responsibility, as established by Goicar and
                Avis India policies. Vehicles should be returned in the same condition in which they were received, with
                full fuel levels and all accessories intact; otherwise, additional charges or penalties will apply (per
                Apace and Europcar India terms). CarRental reserves the right to terminate the rental or impose late return
                fees if the vehicle is not returned on time or is misused.<br><br>

                All users indemnify CarRental against liabilities arising from damage, theft, or third-party claims not
                covered by insurance. These Terms are governed by Indian law, and if any provision is held invalid, the
                remainder will continue in full effect—a standard approach used by Wanderides and Uttaranchal Car Rental.”

            </div>
        </div>
    </main>
@endsection
