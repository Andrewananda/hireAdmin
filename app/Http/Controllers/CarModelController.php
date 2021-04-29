<?php

namespace App\Http\Controllers;

use App\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarModelController extends Controller
{
    public function index() {
        return view('cars.add_car_model');
    }

    public function create_car_model(Request $request) {
        $carModel = new CarModel();
        $validation = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with(['warning'=> 'All inputs required']);
        } else{
            $title = $request->post('title');
            $description = $request->post('description');

            $carModel->title = $title;
            $carModel->description = $description;

            $carModel->save();

            if ($carModel) {
                return redirect()->back()->with(['success'=>'Submitted successfully']);
            }else {
                return redirect()->back()->with(['error'=>'Something went wrong while trying to save']);
            }
        }
    }

    public function all_car_models() {
        return view('cars.all_car_models');
    }
}
