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

    public function create_reservation() {
        $enquiries = Enquiry::all();
        $cars = Car::where(['status'=>'available'])->get();

        return view('reservations.create_reservation', ['enquiries'=>$enquiries, 'cars'=>$cars]);
    }

    public function save_reservation(Request $request) {
        $validation = Validator::make($request->all(), [
            'enquiry_id'=>'required',
            'date'=>'required',
            'car_id'=>'required',
            'message'=>'nullable'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->with(['error'=>$validation->errors()]);
        }else {
            $reservation = new Reservation();
            $reservation->enquiry_id = $request->post('enquiry_id');
            $reservation->start_date = $request->post('date');
            $reservation->end_date = $request->post('date');
            $reservation->car_id = $request->post('car_id');

            $reservation->save();
            return redirect()->back()->with(['success'=>'Reservation created successfully']);
        }
    }

    public function all_reservations() {
        $reservations = Reservation::with('enquiry')
            ->orderBy('id', 'desc')
            ->get();
        return view('reservations.all_reservations', ['reservations'=>$reservations]);
    }
}
