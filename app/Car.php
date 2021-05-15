<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    function model() {
        return $this->belongsTo(CarModel::class);
    }

    function gallery() {
        return $this->belongsTo(Gallery::class);
    }
}
