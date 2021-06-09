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
Route::get('/logout', 'HomeController@logout')->name('logout');

//cars
Route::get('/car', 'CarController@index')->name('car.add');
Route::post('/add-car', 'CarController@addCar')->name('car.create_car');
Route::get('/all-cars', 'CarController@getCars')->name('car.all_cars');
Route::get('/edit-car/{id}', 'CarController@editCar')->name('car.edit_car');
Route::post('/edit/{id}','CarController@actualEdit')->name('car.edit');
Route::get('/delete-car/{id}', 'CarController@deleteCar')->name('car.delete');


//Car Model
Route::get('/car_model', 'CarModelController@index')->name('car.add_model');
Route::post('/create_car_model', 'CarModelController@create_car_model')->name('car.create_car_model');
Route::get('/all_car_models', 'CarModelController@all_car_models')->name('car.all_car_models');
Route::get('/car_model/{id}', 'CarModelController@edit_car_model')->name('edit.car_model');
Route::post('/edit_car_model/{id}','CarModelController@save_edit_car_model')->name('car.save_edit_car_model');
Route::get('/delete_car_model/{id}', 'CarModelController@delete_car_model')->name('delete.car_model');

//Car hire duration
Route::get('/hire_duration', 'CarController@add_duration')->name('duration.add_duration');
Route::post('/create_hire_duration', 'CarController@create_duration')->name('duration.create_duration');
Route::get('/edit_duration/{id}', 'CarController@edit_duration')->name('duration.edit_duration');


//Car Gallery
Route::get('/car_gallery', 'GalleryController@index')->name('car.add_gallery');
Route::post('/create_gallery', 'GalleryController@create_gallery')->name('car.create_gallery');
Route::get('/gallery_all', 'GalleryController@all_car_galleries')->name('car.all_galleries');

//Car Enquiry
Route::get('/enquiry', 'EnquiryController@index')->name('enquiry.add');
Route::post('/create_enquiry', 'EnquiryController@create_enquiry')->name('enquiry.create');
Route::get('/all_enquiries', 'EnquiryController@fetch_enquiries')->name('enquiry.all');
Route::get('/reserve_car/{id}', 'EnquiryController@reserve_car')->name('enquiry.add_reservation');

//Users
Route::get('/add_user', 'UserController@index')->name('user.add');
Route::post('/create_user', 'UserController@create_user')->name('user.create');
Route::get('/all_users', 'UserController@get_users')->name('user.all');
Route::get('/edit_user/{id}', 'UserController@edit_user')->name('edit.user');
