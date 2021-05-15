<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('gallery.add_gallery', ['cars'=>$cars]);
    }

    public function all_car_galleries() {
        return view('gallery.all_galleries');
    }
}
