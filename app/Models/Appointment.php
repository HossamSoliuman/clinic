<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    
    public $timestamps=false;
    protected $hidden=['updated_at','created_at'];
    protected $fillable=[
        'doctor_id',
        'user_id',
        'service_id',
        'date',
        'number'
    ];
}
