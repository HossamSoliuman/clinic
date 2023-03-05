<?php

use App\Http\Controllers\AdminController;
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


Route::middleware(['auth','isDoctor'])->prefix('doctor')->group(function(){
   Route::get('profile',[DoctorController::class,'index'])->name('doctor.profile');
   Route::get('books',[DoctorController::class,'show_books']);
   Route::get('/appointment/delete/{id}',[AppointmentController::class,'delete']);
   Route::get('/settings',[DoctorController::class,'show']);
   Route::post('/update/{id}',[DoctorController::class,'update'])->name('doctor.update');
});
Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function() {
   Route::get('profile',[AdminController::class,'index'])->name('admin.profile');
   Route::get('add_doctor',[AdminController::class,'add_doctor'])->name('admin.add');
   Route::get('show_all_doctors',[AdminController::class,'show_all_doctors'])->name('admin.show_all');
   Route::get('delete_doctor/{id}',[AdminController::class,'delete_doctor'])->name('admin.delete_doctor');
   Route::post('/store_doctor',[AdminController::class,'store_doctor'])->name('admin.store_doctor');
});
