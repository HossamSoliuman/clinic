@extends('layouts.adminApp')
@section('content')
<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $i=> $doctor)
        <tr>
            <th scope="row">{{$i+1}}</th>
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->email}}</td>
            <td>
                
                <a class="btn btn-danger" href="{{route('admin.delete_doctor',['id'=>$doctor->id])}}">Delete</a>
            
            </td>
          </tr>
        @endforeach
      
  
    </tbody>
  </table>
@endsection