@extends('layouts.adminApp')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{$allAppointments}}</span>
        <span class="count-name">All Appointments</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-ticket"></i>
        <span class="count-numbers"> {{$commingAppointments}} </span>
        <span class="count-name">Comming Appointments</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-database"></i>
        <span class="count-numbers">{{$users}}</span>
        <span class="count-name">Users</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers"> {{$doctors}} </span>
        <span class="count-name">Doctors</span>
      </div>
    </div>
  </div>
</div>

@endsection