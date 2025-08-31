<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
   public function home() {
    $data['featuresCars'] = Car::latest()
    ->where('isAvailable',1)
    ->limit(6)
    ->get();
    return view('home',$data);
   }

   public function cars() {
     $data['cars'] = Car::latest()
    ->where('isAvailable',1)
    ->paginate(10);
    return view('cars.car-list',$data);
   }

    public function CarDetail(string $slug) {
     $carDetail = Car::where('slug',$slug)->first();
     if($carDetail == null) {
       return redirect()->route('home');
     }
     $data['carDetail'] = $carDetail;
    return view('cars.detail',$data);
   }

   public function MyBookings() {
    return view('MyBookings');
   }


//    create booking

 public function createBooking(Request $request)
    {
        $user = Auth::user()->id;
        $carId = $request->car_id;
        $pickupDate = Carbon::parse($request->pickupDate);
        $returnDate = Carbon::parse($request->returnDate);


        // 1. Check availability
        $exists = Booking::where('car_id', $carId)
            ->where('pickupDate', '<=', $returnDate->toDateString())
            ->where('returnDate', '>=', $pickupDate->toDateString())
            ->exists();


        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Car is not available'
            ]);
        }

        // 2. Fetch car and calculate price
        $car = Car::findOrFail($carId);
        $noOfDays = $pickupDate->diffInDays($returnDate) + 1;
        $price = $car->pricePerDay * $noOfDays;

        // 3. Create booking
        $carBooking = new Booking();
        $carBooking-> car_id = $carId;
        $carBooking->owner_id = $car->owner_id;
        $carBooking->user_id = $user;
        $carBooking->pickupDate = $pickupDate->toDateString();
        $carBooking->returnDate = $returnDate->toDateString();
        $carBooking->price = $price;
        $carBooking->save();
        return response()->json([
            'status' => true,
            'message' => 'Booking Created'
        ]);
    }
}
