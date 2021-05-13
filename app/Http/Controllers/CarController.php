<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index() {
        $car_models = CarModel::all();
        return view('cars.add_car', ['car_models'=>$car_models]);
    }
    public function addCar(Request $request) {
        $validation = Validator::make($request->all(), [
           'model_id'=>'required',
            'year'=>'required',
            'number_of_seats'=>'required',
            'number_plate'=>'required',
            'status'=>'required',
            'price'=>'required',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->with(['error', 'Please fill the required inputs']);
        }else {
            if ($request->has('photo')) {
                $filenameWithExt = $request->file('photo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.'  . $extension;
                $request->file('photo')->storeAs('public/images',$filenameToStore);

                //check if model exist
                $model = CarModel::where(['id'=>$request->post('model_id')])->first();

                if ($model) {
                    $car = new Car();
                    $car->name = "";
                    $car->model_id = $model->id;
                    $car->year = $request->post('year');
                    $car->number_of_seats = $request->post('number_of_seats');
                    $car->number_plate = $request->post('number_plate');
                    $car->status = $request->post('status');
                    $car->price=$request->post('price');
                    $car->photo = $filenameToStore;
                    $car->save();
                    return redirect()->back()->with(['success'=>'Successfully added car']);
                } else {
                    return redirect()->back()->with(['error'=> 'Car model does not exist']);
                }
            }
        }
    }

    public function getCars() {
        $cars = Car::all();
        return view('cars.all_cars',['cars'=>$cars]);
    }

    public function editCar($id) {
        $car = Car::where(['id'=>$id])->first();
        $car_models = CarModel::all();
        if ($car) {
            return view('cars.edit_car',['car'=>$car, 'car_models'=>$car_models]);
        }else{
            //return 404
            return redirect()->back();
        }
    }

    public function actualEdit($id, Request $request) {
        $car = Car::where(['id'=>$id])->first();
        if ($car) {
            $validation = Validator::make($request->all(),[
                'model_id'=>'required',
                'year'=>'required',
                'number_of_seats'=>'required',
                'number_plate'=>'required',
                'status'=>'required',
                'photo'=>'nullable'
            ]);
            if ($validation->fails()) {
                return redirect()->back()->with(['error'=>'Kindly fill required fields']);
            }else {
                $car->model_id = $request->post('model_id');
                $car->year = $request->post('year');
                $car->number_of_seats = $request->post('number_of_seats');
                $car->status = $request->post('status');
                $car->update();
                return redirect()->back()->with(['success'=>'Car updated successfully']);
            }
        }else{
            return redirect()->back()->with(['error'=>'Car Cannot be found']);
        }
    }
}
