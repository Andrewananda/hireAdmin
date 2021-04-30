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
        $car_models = CarModel::all();
        return view('cars.all_car_models',['car_models'=> $car_models]);
    }

    public function edit_car_model($id) {

        $car_model = CarModel::where(['id'=>$id])->first();
        return view('cars.edit_car_model', ['model'=>$car_model]);
    }

    public function save_edit_car_model(Request $request,$id) {
        $validation = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with(['warning'=>'All fields are required']);
        } else{
            $car_model = CarModel::where(['id'=>$id])->first();
            $car_model->title = $request->post('title');
            $car_model->description = $request->post('description');

            $car_model->update();
            return redirect()->route('car.all_car_models')->with(['success'=>'Updated Successfully!']);
        }
    }

    public function delete_car_model($id) {
        $car_model = CarModel::where(['id'=> $id])->first();
        if ($car_model) {
            $car_model->delete();
            return redirect()->back()->with(['success'=>'Deleted Successfully']);
        } else {
            //todo redirect to 404 page
            return;
        }
    }
}
