<?php

namespace App\Http\Controllers;

use App\HireDuration;
use Illuminate\Http\Request;

class HireController extends Controller
{
    public function index() {
        return view('home');
    }

    public function all_hire_duration() {
        $duratins = HireDuration::all();
        return view('hire.all_hire_durations',['durations'=>$duratins]);
    }

    public function edit_hire_duration($id) {
        $hire_duration = HireDuration::where(['id'=>$id])->first();
        if (!$hire_duration) {
            return redirect()->back()->with('error', 'Hire duration not found');
        }else{
            return view('hire.edit_hire_duration', ['hire_duration'=>$hire_duration]);
        }
    }
}
