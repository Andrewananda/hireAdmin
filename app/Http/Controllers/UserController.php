<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        return view('user.create_user');
    }

    public function create_user(Request $request) {
        $validation = Validator::make($request->all(), [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'nullable',
            'phone'=>'required',
            'password'=>'required',
            'gender'=>'nullable',
            'id_number'=>'required',
            'confirm_password'=>'required'
        ]);
        if ($validation->fails()){
            return redirect()->back()->with(['error', $validation->errors()]);
        }else {
            $password = $request->post('password');
            $confirm_password = $request->post('confirm_password');
            if ($password !== $confirm_password){
                return redirect()->back()->with(['error', 'Password do not match']);
            }else {
                $user = new User();
                $user->name = $request->post('first_name') .  ' ' . $request->post('last_name');
                $user->email =  $request->post('email');
                $user->phone = $request->post('phone');
                $user->gender = $request->post('gender');
                $user->id_number = $request->post('id_number');
                $user->password = Hash::make($request->post('password'));

                $user->save();
                return redirect()->back()->with(['success'=>'User Created Successfully']);
            }
        }
    }


    public function get_users() {
        $users = User::all();
        return view('user.all_users',['users'=>$users]);
    }
}
