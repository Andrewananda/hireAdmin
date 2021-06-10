<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    function car() {
        return $this->belongsTo(Car::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    public function reservation() {
        return $this->hasMany(Reservation::class);
    }
}
