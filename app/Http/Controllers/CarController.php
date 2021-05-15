<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\HireDuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index() {
        $car_models = CarModel::all();
        $hire_durations = HireDuration::all();
        return view('cars.add_car', ['car_models'=>$car_models, 'hire_durations'=>$hire_durations]);
    }
    public function addCar(Request $request) {
        $validation = Validator::make($request->all(), [
           'model_id'=>'required',
            'year'=>'required',
            'number_of_seats'=>'required',
            'hire_duration_id' => 'required',
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
                    $car->hire_duration_id=$request->post('hire_duration_id');
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

    public function add_duration() {
        return view('duration.add_duration');
    }

    public function create_duration(Request $request) {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'description'=>'nullable'
        ]);

        if ($validation->fails()){
            return redirect()->back()->with(['error'=>$validation->errors()]);
        }else{
            $duration = new HireDuration();
            $duration->name = $request->post('name');
            $duration->description = $request->post('description');
            $duration->save();
            return redirect()->back()->with(['success'=>'Added Successfully']);
        }
    }

    public function fetch_single_duration($id) {
        $duration = HireDuration::where(['id'=>$id])->first();
        if (!$duration) {
            return redirect()->back()->with(['error'=>'Duration cannot be found']);
        }else {
            return view('duration.edit_duration', ['duration'=>$duration]);
        }
    }

    public function edit_duration(Request $request, $id) {
        $duration = HireDuration::where(['id'=>$id])->first();
        if ($duration){
            $validation = Validator::make($request->all(), [
               'name'=>'required',
               'description'=>'nullable'
            ]);
            if ($validation->fails()){
                return redirect()->back()->with(['error'=>$validation->errors()]);
            }else {
                $duration->name = $request->post('name');
                $duration->description = $request->post('description');
                return redirect()->back()->with(['success'=>'Created successfully']);
            }
        }else{
            return redirect()->back()->with(['error'=>'Duration not found']);
        }
    }
}
