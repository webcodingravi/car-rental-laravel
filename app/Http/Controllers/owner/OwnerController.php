<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OwnerController extends Controller
{
    public function Dashboard()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        if ($role != 'owner') {
            Auth::logout();
            return redirect()->route('home')->with("error", 'Unauthorized');
        }

        $data['cars'] = Car::where('owner_id', $id)->count();

        $data['bookings'] = Booking::where('owner_id', $id)->with('cars')->count();

        $data['pendingBookings'] = Booking::where('owner_id', $id)->where('status', 'pending')->count();
        $data['completedBookings'] = Booking::where('owner_id', $id)->where('status', 'confirmed')->count();
        $data['monthlyRevenuebookings'] = Booking::where('status', 'confirmed')->sum('price');
        $data['recentBookings'] = Booking::orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('owner.dashboard', $data);
    }

    public function AddCar()
    {
        return view('owner.AddCar');
    }

    public function AddCarProcess(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'category' => 'required',
            'seating_capacity' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'pricePerDay' => 'required',
            'location' => 'required',


        ]);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $ImageName = time() . '.' . $ext;
        $image->move(public_path('uploads/cars/'), $ImageName);


        $addCar = new Car();
        $addCar->image = $ImageName;
        $addCar->brand = trim($request->brand);
        $addCar->slug = Str::slug($request->brand);
        $addCar->model = trim($request->model);
        $addCar->year = trim($request->year);
        $addCar->category = trim($request->category);
        $addCar->seating_capacity = trim($request->seating_capacity);
        $addCar->fuel_type = trim($request->fuel_type);
        $addCar->transmission = trim($request->transmission);
        $addCar->pricePerDay = trim($request->pricePerDay);
        $addCar->location = trim($request->location);
        $addCar->description = trim($request->description);
        $addCar->owner_id = !empty(Auth::user()->id);
        $addCar->save();

        return redirect()->back()->with('success', 'Add Car Successfully');
    }


    public function ManageCars()
    {
        $id = Auth::user()->id;
        $cars = Car::where('owner_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        $data['cars'] = $cars;
        return view('owner.ManageCars', $data);
    }


    public function EditCar(string $id)
    {
        $data['car'] = Car::findOrFail($id);
        return view('owner.EditCar', $data);
    }

    public function UpdateCar(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'category' => 'required',
            'seating_capacity' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'pricePerDay' => 'required',
            'location' => 'required',

        ]);

        $updateCar = Car::findOrFail($id);
        $updateCar->brand = trim($request->brand);
        $updateCar->slug = Str::slug($request->brand);
        $updateCar->model = trim($request->model);
        $updateCar->year = trim($request->year);
        $updateCar->category = trim($request->category);
        $updateCar->seating_capacity = trim($request->seating_capacity);
        $updateCar->fuel_type = trim($request->fuel_type);
        $updateCar->transmission = trim($request->transmission);
        $updateCar->pricePerDay = trim($request->pricePerDay);
        $updateCar->location = trim($request->location);
        $updateCar->description = trim($request->description);
        $updateCar->owner_id = !empty(Auth::user()->id);
        $updateCar->save();

        if (!empty($request->file('image'))) {

            // old file Deleted
            File::delete(public_path('uploads/cars/' . $updateCar->image));

            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $ImageName = time() . '.' . $ext;
            $image->move(public_path('uploads/cars/'), $ImageName);
            $updateCar->image = $ImageName;
            $updateCar->save();
        }

        return redirect()->back()->with('success', 'Car Updated Successfully');
    }



    public function deleteCar(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        //  old image deleted
        File::delete(public_path('uploads/cars/' . $car->image));

        return redirect()->back()->with('success', 'Car Deleted Successfully');
    }




    // profile pic update

    public function profilePic(Request $request)
    {
        $id = Auth::user()->id;

        $profilePic = User::where('id', $id)->first();

        if ($profilePic == null) {
            return response()->json([
                'status' => false,
                'message' => 'Owner Not Found'
            ]);
        }

        if (!empty($request->image)) {
            // old image deleted
            File::delete(public_path('uploads/profilePic/' . $profilePic->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time() . '.' . $ext;
            $image->move(public_path('uploads/profilePic/'), $ImageName);
            $profilePic->image = $ImageName;
            $profilePic->save();
        }
        return redirect()->back()->with('success', 'Profile Picture Successfully Updated');
    }


    public function toggleCarAvailability(Request $request)
    {
        $carId = $request->carId;

        $car = Car::findOrFail($carId);

        if (Auth::user()->id != $car->owner_id) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ]);
        }

        // Toggle the availability and save
        $car->isAvailable = !$car->isAvailable;
        $car->save();

        return response()->json([
            'status' => true,
            'message' => 'Availability toggled'
        ]);
    }


    // ManageBookings
    public function ManageBookings()
    {
        $data['bookings'] = Booking::where('owner_id', Auth::user()->id)
        ->with(['car', 'user'])
            ->OrderBy('created_at', 'desc')->paginate(2);
        return view('owner.ManageBookings', $data);
    }


    public function changeBookingStatus(Request $request) {
        $bookingId = $request->bookingId;

        $booking = Booking::where('id',$bookingId)->first();
        if($booking == null) {
            return response()->json([
                'status'=> false,
                'message' => 'Booking Not Found'
            ]);
        }

        $booking->status = $request->status;
        $booking->save();

        return response()->json([
            'status' => true,
            'message' => 'Booking Status Change Successfully'
        ]);

    }
}
