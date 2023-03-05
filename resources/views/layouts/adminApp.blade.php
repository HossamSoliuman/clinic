@extends('layouts.app')
@section('body')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-doctor"></i> <span class="ms-1 d-none d-sm-inline">Doctors</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a  href="{{route('admin.add')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">ADD doctor</span>  </a>
                            </li>
                            <li>
                                <a href="{{route('admin.show_all')}}"  class="nav-link px-0"> <span class="d-none d-sm-inline">Show all doctors</span> </a>
                            </li>
                        </ul>
                    </li>
                   
            </div>
        </div>
        <div class="col py-3">
             @if ( session()->has('msg'))
                <div class="alert alert-success" role="alert">
                     {{session()->get('msg')}}
                 </div>  
            @endif
            @yield('content')
        </div>
    </div>
</div>
@endsection