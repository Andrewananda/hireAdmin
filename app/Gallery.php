<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function cars() {
        return $this->hasMany(Car::class);
    }
}
