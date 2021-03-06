<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['car_id', 'image_url'];

    public function cars() {
        return $this->hasMany(Car::class);
    }
}
