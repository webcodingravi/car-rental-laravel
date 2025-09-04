@extends('layouts.app')
@section('content')
    <main class="min-h-screen w-full bg-slate-100">
        <div class="w-full flex flex-col items-center justify-center py-20">
            <h1 class="font-bold text-4xl pb-2">Privacy & Policy</h1>
            <span class="font-medium text-gray-600 text-sm"><a href="{{ route('home') }}">Home</a> / Privacy & Policy</span>
        </div>

        <hr class="text-slate-200">
        <div class="px-6 md:px-32 mt-13 pb-8 md:pb-0">
            <div class="text-slate-600">
                "CarRental humare users ki privacy ko bahut gambhirta se lete hain. Hum sirf vohi vyaktigat (personal) aur
                samvedansheel (sensitive) jaankari ikattha karte hain jo aapke booking process, identity verification aur
                regulatory compliance ke liye avashyak hoti hai—jaise ki naam, contact details, driving licence, payment aur
                location data. Hum ye jaankari aapke consent se hi ikattha karte hain aur uska istemal sirf internal
                processing, customer support, fraud prevention aur service sudhar ke liye karte hain. Humari practices
                Information Technology Act, 2000 aur IT Rules, 2011 ke tahat honi chahiye—jo ki data collection, usage aur
                protection ke liye clear guidelines dete hain.
                <br /><br>
                Humari website cookies aur log files ka upyog karti hai taaki session manage ho sake aur experience
                personalize kiya ja sake, jaisa ki industry leaders jaise Sudarshan Cars aur Avis India karte hain<br><br>

                Aapki information sirf authorised employees aur third-party service providers ke saath hi share ki jaati
                hai, jin par strict confidentiality obligations lage hote hain, aur hum is information ko tab tak rakhte
                hain jab tak service fulfilment ya kanooni avashyakta poori na ho jaye, jaisa Zeta Cars ne mention kiya hai

            </div>
        </div>
    </main>
@endsection
