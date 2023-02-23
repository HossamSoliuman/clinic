@extends('layouts.doctorApp')
@section('content')
<div class="container pt-5 w-75 left">
    <form method="POST" action="{{route('doctor.update',['id'=>$doctor->id])}}" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="tesxt" class="form-control" id="exampleInputName"  value="{{$doctor->name}}">
          </div>
          @error('name')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group">
            <label for="name">Phone</label>
            <input name="phone" type="tesxt" class="form-control" id="exampleInputName"  value="{{$doctor->phone}}">
          </div>
          @error('phone')
          <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
          </span>
        @enderror
          
         
          
          <p>social links</p>
          <div class="form-group">
            <label for="name">facebook</label>
            <input name="social[facebook]" type="tesxt" class="form-control" id="exampleInputName" value="{{$doctor->social->facebook}}" >
          </div>
          <div class="form-group">
            <label for="name">instagram</label>
            <input name="social[instagram]" type="tesxt" class="form-control" id="exampleInputName"value="{{$doctor->social->instagram}}" >
          </div>
          <div class="form-group">
            <label for="name">twitter</label>
            <input name="social[twitter]" type="tesxt" class="form-control" id="exampleInputName" value="{{$doctor->social->twitter}}" >
          </div>
          <div class="form-group">
            <label for="name">linkedin</label>
            <input name="social[linkedin]" type="tesxt" class="form-control" id="exampleInputName" value="{{$doctor->social->linkedin}}" >
          </div>
          <div class="form-group">
            <label for="name">Photo</label><br>
            <input name="social[photo]" type="file" value="{{$doctor->social->photo}}" >
          </div>
          

          
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
      
       
    
</div>

@endsection