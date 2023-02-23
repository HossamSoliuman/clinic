@extends('layouts.doctorApp')
@section('content')
@foreach ($books as $book)
<div class="card-center text-center w-75 p-5" >
  <div class="card-header">
    Main information
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$book->user->name}}</h5>
    <p class="card-text">Service : {{$book->service->name}}</p>
    <p class="card-text">Age : {{$book->user->age}}</p>
    <p class="card-text">Phone : {{$book->user->phone}}</p>
    <a href='appointment/delete/{{$book->id}}' class="btn btn-primary">Treatment done</a>
  </div>
  <div class="card-footer text-muted">
    Date: {{$book->date}}
  </div>
</div>
@endforeach


@endsection