<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralResponse extends Controller
{
    public static function success($info, $message, $count, $data) {
        return response()->json([
            'info'=>$info,
            'message'=>$message,
            'count'=>$count,
            'data'=>$data
        ])->setStatusCode(200);
    }

    public static function error($error) {
        return response()->json([
            'info'=>'error',
            'message'=>$error,
            'count'=>0,
            'data'=>null
        ])->setStatusCode(200);
    }
}
