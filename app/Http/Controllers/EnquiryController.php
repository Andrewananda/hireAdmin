<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\User;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index() {
        $users = User::all();
        $carModel = CarModel::all();
        $cars = Car::where(['status'=>'available'])->get();
        return view('enquiries.create_enquiry',['users' => $users, 'carModels'=>$carModel, 'cars'=>$cars]);
    }

    public function create_enquiry(Request $request) {

    }
}
