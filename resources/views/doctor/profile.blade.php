@extends('layouts.doctorApp')
@section('content')
<h3 class="test-center">Welcome Dr {{$doctor_name}}</h3>
    
        <img class="test-center w-25"  src="{{URL::asset("img/doctors/$photo") }}"alt="">
    




@endsection