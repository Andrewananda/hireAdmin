<?php

namespace App\Http\Controllers;

use App\Car;
use App\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('gallery.add_gallery', ['cars'=>$cars]);
    }

    public function all_car_galleries() {
        return view('gallery.all_galleries');
    }

    public function create_gallery(Request $request) {
        $validation = Validator::make($request->all(), [
            'car_id'=>'required',
            'photo'=>'nullable'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with(['error'=> $validation->errors()]);
        }else {
            $car_id = Car::where(['id'=>$request->post('car_id')])->first();
            if ($car_id) {
                foreach ($request['photo'] as $photo) {
                    $filenameWithExt = $photo->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                    $extension = $photo->getClientOriginalExtension();
                    $filenameToStore = $filename . '_' . time() . '.'  . $extension;
                    $photo->storeAs('public/images',$filenameToStore);

                    Gallery::create([
                        'car_id'=>$request->post('car_id'),
                        'image_url'=> $filenameToStore
                    ]);
                }
                return redirect()->back()->with(['success'=>'Gallery created successfully']);
            }else {
                return redirect()->back()->with(['error'=>'Car cannot be found']);
            }
        }
    }
}
