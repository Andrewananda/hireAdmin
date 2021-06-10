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
}
