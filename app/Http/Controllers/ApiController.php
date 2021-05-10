<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function all_cars() {
        $cars = Car::with('model')->get();
        $count = count($cars);
        if ($cars){
            return GeneralResponse::success('success', $count,  $cars);
        }else {
            return GeneralResponse::error('Cannot find cars');
        }
    }

    public function register(Request $request) {
        $validation = Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'nullable',
            'gender'=>'required',
            'id_number'=>'required',
            'password'=>'required',
            'phone'=>'required'
        ]);

        if ($validation->fails()) {
            return GeneralResponse::error('Kindly provide all required fields');
        }else  {
            $email = $request->post('email');
            $phone = $request->post('phone');
            $emailAndPhoneValidation = $this->validateEmailAndPhone($email, $phone);
            if ($emailAndPhoneValidation) {
                $username = $request->post('first_name') . ' ' . $request->post('last_name');
                $user = new User();
                $user->name = $username;
                $user->email = $email;
                $user->gender = $request->post('gender');
                $user->id_number = $request->post('id_number');
                $user->password = Hash::make($request->post('password'));

                $user->save();
                return GeneralResponse::success('success',0, $user);
            }

        }
    }

    public function validateEmailAndPhone($email, $phone) {
        $user_email = User::where(['email'=>$email])->first();
        //$user_phone = User::where(['phone'=>$phone])->first();
        if ($user_email) {
            return $this->throwError('Email already exists');
        }
//        elseif ($user_phone) {
//            return  $this->throwError('Phone number is already in use');
//        }
    }

    public function throwError($message) {
        return GeneralResponse::error($message);
    }

    public function login(Request $request) {
       $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)) {
           //$request->session()->regenerate();
           $user = Auth::user();
           return GeneralResponse::success('success', 0, $user);
       }else {
           return GeneralResponse::error('User not found');
       }
    }
}
