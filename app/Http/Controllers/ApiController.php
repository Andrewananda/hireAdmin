<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Car;
use App\Enquiry;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ApiController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user()
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function all_cars() {
        $cars = Car::with('model')->get();
        $count = count($cars);
        if ($cars){
            return GeneralResponse::success('success', 'cars fetched successfully', $count,  $cars);
        }else {
            return GeneralResponse::error('Cannot find cars');
        }
    }

    public function register(Request $request) {
        $validation = Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'nullable|unique:users,email',
            'gender'=>'required',
            'id_number'=>'required',
            'password'=>'required',
            'phone'=>'required|unique:users,phone'
        ]);

        if ($validation->fails()) {
            return GeneralResponse::error($validation->errors()->toJson());
        }
        $email = $request->post('email');
        $phone = $request->post('phone');

        $username = $request->post('first_name') . ' ' . $request->post('last_name');
        $user = new User();
        $user->name = $username;
        $user->email = $email;
        $user->gender = $request->post('gender');
        $user->phone = $phone;
        $user->id_number = $request->post('id_number');
        $user->password = Hash::make($request->post('password'));

        $user->save();

        return GeneralResponse::success('success','Registered successfully',0, $user);
    }


    public function throwError($message) {
        return GeneralResponse::error($message);
    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);

    }

    public function logout() {
        auth('api')->logout();
        return GeneralResponse::success('success','logout was successful', 0, []);
    }

    public function create_enquiry(Request $request) {
        $validation = Validator::make($request->all(), [
            'user_id'=>'required',
            'car_id' => 'required',
            'date'=>'nullable',
            'message'=>'nullable',
        ]);

        if ($validation->fails()) {
            return GeneralResponse::error('Kindly fill required fields');
        }else {
            $user = User::where(['id'=>$request->post('user_id')])->first();
            if ($user) {
                $enquiry = new Enquiry();
                $enquiry->user_id = $request->post('user_id');
                $enquiry->car_id = $request->post('car_id');
                $enquiry->date = $request->post('date');
                $enquiry->message =  $request->post('message');
                $enquiry->save();
                return GeneralResponse::success('success','enquiry created successfully',0, $enquiry);
            }else {
                return GeneralResponse::error('User does not exist');
            }
        }
    }

    public function create_booking(Request $request) {
        $validation = Validator::make($request->all(), [
            'user_id'=>'required',
            'car_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        if ($validation->fails()) {
            return GeneralResponse::error($validation->errors()->toJson());
        }else {
            $car = Car::where(['id'=>$request->post('car_id')])->first();
            if ($car) {
                if ($car->status == 'Available') {
                    $booking = new Booking();
                    $booking->user_id = $request->post('user_id');
                    $booking->car_id = $request->post('car_id');
                    $booking->start_date = $request->post('start_date');
                    $booking->end_date = $request->post('end_date');
                    $booking->save();
                    return GeneralResponse::success('success', 'successfully added data', 0, $booking);
                }else {
                    return GeneralResponse::success('success', 'Car not available',0, null);
                }
            }else{
                return GeneralResponse::error('Car does not exist');
            }
        }
    }

}
