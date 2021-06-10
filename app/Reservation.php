<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function enquiry() {
        return $this->belongsTo(Enquiry::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function car() {
        return $this->belongsTo(Car::class);
    }
}
