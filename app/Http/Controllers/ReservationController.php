<?php

namespace App\Http\Controllers;

use App\Car;
use App\Enquiry;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function add_reservation($id, Request $request) {
        $enquiry = Enquiry::where(['id'=>$id])->first();
        if (!$enquiry){
            return redirect()->back()->with(['error'=>'Enquiry not found on record']);
        }else {
            $validation = Validator::make($request->all(), [
                'start_date'=>'required',
                'end_date'=>'required',
                'name'=>'required',
                'id_number'=>'required',
                'phone'=>'required',
                'email'=>'required',
            ]);

            if ($validation->fails()){
                return redirect()->back()->with('error',$validation->getMessageBag());
            }else {
                $reservation = new Reservation();
                $reservation->enquiry_id = $id;
                $reservation->start_date = $request->post('start_date');
                $reservation->end_date = $request->post('end_date');
                $reservation->car_id = $enquiry->car_id;
                $reservation->save();

                $car = Car::where(['id'=>$enquiry->car_id])->first();
                $car->status = 'reserved';
                $car->update();

                return redirect()->back()->with(['success'=>'Reservation created successfully']);
            }
        }
    }
}
