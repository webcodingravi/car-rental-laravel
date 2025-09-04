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
    $data['meta_title'] = 'Home';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';
    $data['featuresCars'] = Car::latest()
    ->where('isAvailable',1)
    ->limit(6)
    ->get();
    return view('home',$data);
   }

   // pages
  public function AboutUs() {
    $data['meta_title'] = 'About Us';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';
    return view('about',$data);
   }

    public function TermsOfService() {
    $data['meta_title'] = 'Terms of Service';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';
    return view('terms-service',$data);
   }


 public function PrivacyPolicy() {
    $data['meta_title'] = 'Privacy & Policy';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';
    return view('privacy-policy',$data);
   }


//    search location, pickupDate, returnDate


   public function cars(Request $request) {
     $data['meta_title'] = 'All Cars';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';

     $cars = Car::query();
    if(!empty($request->location)) {
        $cars = $cars->where('location','like','%'.$request->location.'%');
    }

  $cars = $cars->where('isAvailable',1);
    $cars = $cars->orderBy('cars.id','desc')->paginate(10);
    $data['cars'] = $cars;
    return view('cars.car',$data);
   }

//    search live
public function search_car(Request $request) {
    if($request->ajax()) {
       $query = $request->get('query');
       $cars = Car::where('brand','like','%'.$query.'%')
       ->orWhere('model','like','%'.$query.'%')
       ->orWhere('location','like','%'.$query.'%')->get();
       return view('cars.list',compact('cars'))->render();

    }
}

    public function CarDetail(string $id) {
    $data['meta_title'] = 'Car Detail';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';

     $carDetail = Car::where('uuid',$id)->first();
     if($carDetail == null) {
       return redirect()->route('home');
     }
     $data['carDetail'] = $carDetail;
    return view('cars.detail',$data);
   }

   public function MyBookings() {
     $data['meta_title'] = 'My Bookings';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';
    $id = Auth::user()->id;
    $data['myBookings'] = Booking::where('user_id',$id)
    ->with('car')
    ->orderBy('created_at','desc')->get();
    return view('MyBookings',$data);
   }


//    create booking

 public function createBooking(Request $request)
    {

        if(Auth::check()) {
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
        $noOfDays = $pickupDate->diffInDays($returnDate);
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


        }else{
             return response()->json([
            'status' => false,
            'message' => 'Please Login!'
        ]);

        }
}










}