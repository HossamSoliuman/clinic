@extends('layouts.adminApp')
@section('content')
    <form action="" method="get">
        <button type="submit" name="add" class="btn btn-primary">Add Service</button>
    </form>
    @isset( $_GET['add'] )
       <form class="form" action="{{route('service.store')}}" method="POST">
        @csrf
        <label for="">Service</label>
        <input required type="text" name="service">    
        <input type="submit" value="Add">   
       </form>
    @endisset

    <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($services as $i=> $service)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$service->name}}</td>
                <td>
                    <form method="POST" action="{{ route('service.destroy',['service'=>$service->id])}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" >Delete</button>
                    </form>
                   
                </td>
              </tr>
            @endforeach
          
      
        </tbody>
      </table>
@endsection