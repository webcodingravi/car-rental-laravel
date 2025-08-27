<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function home() {
    return view('home');
   }

   public function cars() {
    return view('cars.car-list');
   }

    public function CarDetail() {
    return view('cars.detail');
   }

   public function MyBookings() {
    return view('MyBookings');
   }
}
