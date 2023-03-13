<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $allAppointments=Appointment::count();
        $commingAppointments=Appointment::where('date','>',date('Y-m-d'))->count();
        return view('admin.profile',['allAppointments'=>$allAppointments,'commingAppointments'=>$commingAppointments]);
    }
    public function add_doctor(){
        return view('admin.add_doctor');
    }
    public function show_all_doctors(){
        $doctors=User::where('role','doctor')->get(['name','id','email']);
        return view('admin.show_all_doctors',compact(['doctors']));
        
    }
    public function store_doctor(Request $request)
    {
       $user=User::create($request->all());
        $user->role='doctor';
        $user->save();
     return redirect()->back()->with('msg','succusfully created');

    }
    public function delete_doctor($id){
        User::find($id)->delete();
        return back()->with('msg','Deleted succussfully');
    }
}
