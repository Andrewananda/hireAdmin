<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\Enquiry;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    public function index() {
        $users = User::all();
        $carModel = CarModel::all();
        $cars = Car::where(['status'=>'available'])->get();
        return view('enquiries.create_enquiry',['users' => $users, 'carModels'=>$carModel, 'cars'=>$cars]);
    }

    public function create_enquiry(Request $request) {
            $validation = Validator::make($request->all(), [
                'user_id'=>'required',
                'car_id'=>'required',
                'date'=>'required',
                'message'=>'nullable'
            ]);
            if ($validation->fails()){
                return redirect()->back()->with(['error'=>$validation->errors()]);
            }else {
                $user = User::where(['id'=>$request->post('user_id')])->first();
                if (!$user){
                    return redirect()->back()->with(['error'=>'User does not exist']);
                }else {
                    $car = Car::where(['id'=>$request->post('car_id')])->first();
                    if ($car){
                        if ($car->status == 'available'){
                            //Save
                            $enquiry = new Enquiry();
                            $enquiry->user_id = $request->post('user_id');
                            $enquiry->car_id = $request->post('car_id');
                            $enquiry->date = $request->post('date');
                            $enquiry->message = $request->post('message');
                            $enquiry->save();
                            return  redirect()->back()->with(['success'=>'Enquiry created successfully']);
                        }else {
                            return redirect()->back()->with(['error'=>'Car you have chose is not available, kindly check available car']);
                        }
                    }else{
                        return redirect()->back()->with(['error'=>'Car you have chose does not exist']);
                    }
                }
            }
    }

    public function fetch_enquiries() {
        $enquiries = Enquiry::all();

        return view('enquiries.all_enquiries', ['enquiries'=>$enquiries]);
    }

    public function reserve_car($id) {
        $enquiry = Enquiry::where(['id'=>$id])->first();
        if (!$enquiry){
            return redirect()->back()->with(['error'=>'Enquiry does not exist']);
        }else {
            return view('reservations.add_reservation',['enquiry'=>$enquiry]);
        }
    }

    public function get_enquiry($id) {
        $enquiry = Enquiry::where(['id'=>$id])->first();
        $users = User::all();
        $cars = Car::all();
        if (!$enquiry){
            return redirect()->back()->with(['error'=> 'Enquiry not found']);
        }else {
            return view('enquiries.edit_enquiry', ['enquiry'=>$enquiry, 'users'=>$users, 'cars'=>$cars]);
        }
    }
}
