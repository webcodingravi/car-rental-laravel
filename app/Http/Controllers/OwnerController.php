<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function Dashboard() {
        return view('owner.layouts.app');
    }
}
