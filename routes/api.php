<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([
    'middleware'=>'jwt.auth'
],  function () {
    Route::post('/create_enquiry', 'ApiController@create_enquiry')->name('create_enquiry');
    Route::post('/logout', 'ApiController@logout')->name('logout');
    Route::post('/book', 'ApiController@create_booking')->name('create_booking');
});
Route::post('/register', 'ApiController@register')->name('register');
Route::post('/login', 'ApiController@login')->name('login');
Route::get('/cars','ApiController@all_cars')->name('cars');
Route::post('/car_details','ApiController@car_details')->name('car_details');
Route::post('/popular_car','ApiController@popular_car')->name('popular_car');
Route::post('/popular_car','ApiController@popular_car')->name('popular_car');
Route::post('/top_deals','ApiController@top_deals')->name('top_deals');


