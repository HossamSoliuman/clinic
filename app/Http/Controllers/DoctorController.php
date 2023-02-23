<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDoctor;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\SocialLink;
use App\Models\User;
use App\Trait\SavePhoto;
use App\Traits\SavePhoto as TraitsSavePhoto;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use TraitsSavePhoto;
    protected $doctor;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->doctor=auth()->user();
    }
    public function index()
    {
        $doctor_name=auth()->user()->name;
         $social=SocialLink::where('doctor_id',auth()->user()->id)->get('photo')->first();
         $photo=$social->photo;
        return view('doctor.profile',['doctor_name'=>$doctor_name,'photo'=>$photo]);
        
    }

    public function show_books(){            
        $doctor_id=auth()->user()->id;
        $books=Appointment::with(['user','service'])->where('doctor_id',$doctor_id)->where('date','>',date('Y-m-d'))->orderBy('date','asc')->orderBy('number','asc')->get();
        return view('doctor.books',['books'=>$books]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=auth()->user()->id;
        $doctor=User::with('social')->find($id); 
        
        return view('doctor.edit',['doctor'=>$doctor]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctor $request,$id)
    {
        
        
        $doctor=User::with('social')->find($id);
        $social=SocialLink::where('doctor_id',$id);       
       
        $photo= $this->SavePhoto($request->social['photo'],'img/doctors');
        $doctor->update($request->all());
        $social->update($request->social);
        $social->update(['photo'=>$photo]);
        return redirect()->route('doctor.profile');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        //
    }
}
