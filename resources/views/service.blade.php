@extends('layouts.app')
<body>
@section('body')
<!-- Service Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5 mb-5">
            {{-- <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                    <img class="position-absolute w-100 h-100" src="img/before.jpg" style="object-fit: cover;">
                    <img class="position-absolute w-100 h-100" src="img/after.jpg" style="object-fit: cover;">
                </div>
            </div> --}}
            <div class="col-lg-7">
                <div class="section-title mb-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Services</h5>
                    <h1 class="display-5 mb-0">We Offer The Best Quality Dental Services</h1>
                </div>
                <div class="row g-5">
                @foreach ($services as $key => $service)
                    @if ($key % 2 == 0)
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.6s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/service-3.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">{{$service->name}}</h5>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.9s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/service-4.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">{{$service->name}}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->



</body>
@endsection
</html>