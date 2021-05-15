<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HireDuration extends Model
{
    function car() {
        return $this->hasMany(Car::class);
    }
}
