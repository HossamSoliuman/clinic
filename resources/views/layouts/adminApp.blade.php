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
                        <a href="{{route('admin.profile')}}" class="nav-link align-middle px-0">
                            <i class="bi bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-toggle="collapse" class="nav-link px-0 align-middle">

                            <i class="bi bi-people"></i><span class="ms-1 d-none d-sm-inline">Doctors</span>
                        </a>
                        
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="nav-item">
                                <a href="{{route('admin.add')}}" class="nav-link px-0">
                                    <i class="bi bi-plus-square"></i><span class="d-none d-sm-inline">Add Doctor</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.show_all')}}" class="nav-link px-0">
                                    <i class="bi bi-table"></i><span class="d-none d-sm-inline">Show All Doctors</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('service.index')}}" class="nav-link align-middle px-0">
                            <i class="bi bi-briefcase"></i><span class="ms-1 d-none d-sm-inline">Service</span>
                        </a>
                    </li>
                </ul>
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
