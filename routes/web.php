<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
   return view( 'home' );
});
Route::get('/home', function () {
   return view( 'home' );
});
Route::get('appointment',[AppointmentController::class,'show_template']);
Route::view('register', 'auth.register')->name('register');
Route::post('appointmet/save',[AppointmentController::class,'save_appointment'])->name('save_appointment');
Route::post("get_vaction",[AppointmentController::class,'get_vaction'])->name('get_vacantion');

Route::view('admin','admin')->name('admin');

Route::middleware(['auth','isDoctor'])->prefix('doctor')->group(function(){
   Route::get('profile',[DoctorController::class,'index'])->name('doctor.profile');
   Route::get('books',[DoctorController::class,'show_books']);
   Route::get('/appointment/delete/{id}',[AppointmentController::class,'delete']);
   Route::get('/settings',[DoctorController::class,'show']);
   Route::post('/update/{id}',[DoctorController::class,'update'])->name('doctor.update');
});
