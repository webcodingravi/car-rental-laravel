<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function Dashboard() {
        return view('owner.dashboard');
    }


    public function AddCar() {
        return view('owner.AddCar');
    }

    public function EditCar() {
           return view('owner.EditCar');
    }

    public function ManageCars() {
        return view('owner.ManageCars');
    }

      public function ManageBookings() {
        return view('owner.ManageBookings');
    }
}