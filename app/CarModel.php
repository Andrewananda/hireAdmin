<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    function car() {
        return $this->hasMany(Car::class);
    }
}
