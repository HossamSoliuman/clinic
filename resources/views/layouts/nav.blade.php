<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="/home" class="navbar-brand p-0">
        <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>DentCare</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/home" class="nav-item nav-link active">Home</a>
            <a href="/about" class="nav-item nav-link">About</a>
            
            <a href="/service" class="nav-item nav-link">Service</a>
            <div class="nav-item dropdown">
                <a href="/#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="/price" class="dropdown-item">Pricing Plan</a>
                    <a href="/team" class="dropdown-item">Our Dentist</a>
                    <a href="/testimonial" class="dropdown-item">Testimonial</a>
                    <a href="/appointment" class="dropdown-item">Appointment</a>
                    
                </div>
            </div>
            <a href="/contact" class="nav-item nav-link">Contact</a>
        </div>
        <a href="/appointment" class="btn btn-primary py-2 px-4 ms-3">Appointment</a>
        @if (auth()->check())
        <form  id="logout-form" action="{{route('logout')}}" method="POST" >
            <button  class="btn btn-danger  py-2 px- ms-3" type="submit">logout</button>
          @csrf
          </form>  
        @else
        <a href="/register" class="btn btn-primary py-2 px-4 ms-3">Register</a>            
        @endif
                 
    </div>
</nav>