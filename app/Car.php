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

    function hire_duration() {
        return $this->belongsTo(HireDuration::class);
    }

    function enquiry(){
        return $this->hasMany(Enquiry::class);
    }

}
