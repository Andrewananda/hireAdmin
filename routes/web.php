<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/enquiry', 'EnquiryController@index')->name('enquiry.add');

//cars
Route::get('/car', 'CarController@index')->name('car.add');
Route::get('/car_model', 'CarModelController@index')->name('car.add_model');
Route::post('/create_car_model', 'CarModelController@create_car_model')->name('car.create_car_model');
Route::get('/all_car_models', 'CarModelController@all_car_models')->name('car.all_car_models');


Route::get('/logout', 'HomeController@logout')->name('logout');
