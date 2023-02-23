<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppointment;
use App\Mail\AppointmentCreated;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function show_template(){
        $doctors=User::where('role','doctor')->get(['id','name']);
        $services=Service::all();
        $days=$this->get_days();      
        return view('appointment',['doctors'=>$doctors,'services'=>$services,"days"=>$days]);
    }

    public function save_appointment(CreateAppointment $req) {

        
        //prepairing data
        $doctor_id=$req->doctor_id;
        $date=$req->date;
        $service_id=$req->service_id;
        $user_id= Auth::id();
        $user=User::find($user_id);
        $number= $this->get_number($date,$doctor_id); 
        $service=Service::find($service_id,"name");
        $doctor=User::find($doctor_id,['name','phone']);

        //creating

        Appointment::create([
            'doctor_id'=>$doctor_id,
            'user_id'=>$user_id,
            'service_id'=>$service_id,
            'date'=>$date,
            'number'=>$number
        ]);

        //sendin messages
       
        $data=array();
        $data['number']=$number;
        $data['date']=$date;
        $data['service']=$service->name;
        $data['user_name']=$user->name;
        $data['doctor_name']=$doctor->name;
        $data['doctor_phone']=$doctor->phone;
        $msg="Appointment booked successfully. Check your eamail please.";
       // Mail::to($user->email)->send(new AppointmentCreated($data));
        return redirect("/")->with('msg',$msg);  
       
    }
    public function get_vacation(Request $req) {
        return redirect()->route("home");
    }
    public function get_days(){
        date_default_timezone_set("Africa/Cairo");
        $day=60*60*24;
        $days=array(array());
        for($i=1;$i<8;$i++)
        {

            $time=time()+($day*$i);
            $days[$i-1]['day']=date("D",$time);
            $days[$i-1]['date']=date("Y-m-d",$time);
            if(date("D",$time) == 'Fri')
            {               
                $days[$i-1]['abled']='disabled ';
                $days[$i-1]['style']='background-color: antiquewhite';
                $days[$i-1]['msg']='-----> vacation day';
                
            }
            else 
            {           
                $days[$i-1]['abled']='';
                $days[$i-1]['style']='';
                $days[$i-1]['msg']='';
            }
                       
        }
        return $days;
    }

    public function get_number($date,$doctor_id){
        return Appointment::where('date',$date)->where('doctor_id',$doctor_id)->count() + 1;

    }
    public function delete($id){
        $appointment=Appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }
}

