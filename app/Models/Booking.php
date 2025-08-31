<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
    public function car() {
    return $this->belongsTo(Car::class, 'car_id');
}

public function user() {
    return $this->belongsTo(User::class, 'user_id');
}
}