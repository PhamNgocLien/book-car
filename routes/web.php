<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
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

Route::get('/register',[UserController::class,'indexRegister'])->name('register.index');
Route::post('/register',[UserController::class,'storeRegister'])->name('register.store');
Route::get('/',[UserController::class,'indexLogin'])->name('login.index');
Route::post('/',[UserController::class,'storeLogin'])->name('login.store');

Route::get('/index',[TripController::class,'indexTrip'])->name('trip.index');
Route::post('/index',[TripController::class,'storeBooking'])->name('booking.store');
Route::get('/edit/{id}',[TripController::class,'editBooking'])->name('booking.edit');
Route::post('/edit/{id}',[TripController::class,'updateBooking'])->name('booking.update');
Route::get('/delete/{id}',[TripController::class,'destroyBooking'])->name('booking.delete');

Route::get('/info',[UserController::class,'indexInfo'])->name('info.index');
Route::get('/info/edit',[UserController::class,'editInfo'])->name('info.edit');
Route::post('/info/edit',[UserController::class,'updateInfo'])->name('info.update');
Route::get('/password/edit',[UserController::class,'editPassword'])->name('password.edit');
Route::post('/password/edit',[UserController::class,'updatePassword'])->name('password.update');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/admin',[TripController::class,'indexAdmin'])->name('admin.index');
Route::post('/admin',[TripController::class,'storeCar'])->name('admin.car.store');
Route::get('/admin/arrange',[TripController::class,'arrangeCar'])->name('admin.car.arrange');
Route::get('/admin/trip',[TripController::class,'tripAdmin'])->name('admin.trip.index');

