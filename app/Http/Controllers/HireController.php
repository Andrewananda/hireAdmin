<?php

namespace App\Http\Controllers;

use App\HireDuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HireController extends Controller
{
    public function index() {
        return view('home');
    }

    public function all_hire_duration() {
        $duratins = HireDuration::query()->orderBy('id', 'desc')->get();
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

    public function delete_hire_duration($id) {
        $hire_duration = HireDuration::where(['id'=>$id])->first();
        if (!$hire_duration){
            return redirect()->back()->with(['error'=>'Hire duration not found']);
        }else {
            $hire_duration->delete();
            return redirect()->back()->with(['success'=>'Deleted successfully!']);
        }
    }

    public function save_edit($id, Request $request) {
        $hire_duration = HireDuration::where(['id'=>$id])->first();
        if (!$hire_duration) {
            return redirect()->back()->with('error', 'Hire duration not found');
        }else {
            $validation = Validator::make($request->all(), [
                'name'=>'required',
                'description'=>'nullable'
            ]);
            if ($validation->fails()) {
                return redirect()->back()->with(['error'=>$validation->errors()]);
            }else {
                $hire_duration->name = $request->post('name');
                $hire_duration->description = $request->post('description');
                $hire_duration->update();
                return  redirect()->back()->with(['success'=>'Updated successfully']);
            }
        }
    }
}
