@extends('layouts.app')
@section('content')
<style>
/* .carte:hover{
transform: scale(1.1);



}*/

.card{
    transition: all 0.3s ease;
}

.card:hover {
 
  transform: scale(1.05);
}
.shadow {
    box-shadow: 0 0 3px rgb(53 64 78 / 20%) !important;
}
.rounded {
    border-radius: 5px !important;
}
.bg-light {
    background-color: #f7f8fa !important;
}
.bg-primary, .btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .badge-primary, .nav-pills .nav-link.active, .pagination .active a, .custom-control-input:checked ~ .custom-control-label:before, #preloader #status .spinner > div, .social-icon li a:hover, .back-to-top:hover, .back-to-home a, ::selection, #topnav .navbar-toggle.open span:hover, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots.clickable .owl-dot:hover span, .watch-video a .play-icon-circle, .sidebar .widget .tagcloud > a:hover, .flatpickr-day.selected, .flatpickr-day.selected:hover, .tns-nav button.tns-nav-active, .form-check-input.form-check-input:checked {
    background-color: #8d72e1 !important;
}

.badge {
    padding: 5px 8px;
    border-radius: 3px;
    letter-spacing: 0.5px;
    font-size: 12px;
}

.btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active {
    box-shadow: 0 3px 7px rgb(109 199 122 / 50%) !important;
}
.btn-primary, .btn-outline-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .bg-soft-primary .border, .alert-primary, .alert-outline-primary, .badge-outline-primary, .nav-pills .nav-link.active, .pagination .active a, .form-group .form-control:focus, .form-group .form-control.active, .custom-control-input:checked ~ .custom-control-label:before, .custom-control-input:focus ~ .custom-control-label::before, .form-control:focus, .social-icon li a:hover, #topnav .has-submenu.active.active .menu-arrow, #topnav.scroll .navigation-menu > li:hover > .menu-arrow, #topnav.scroll .navigation-menu > li.active > .menu-arrow, #topnav .navigation-menu > li:hover > .menu-arrow, .flatpickr-day.selected, .flatpickr-day.selected:hover, .form-check-input:focus, .form-check-input.form-check-input:checked, .container-filter li.active, .container-filter li:hover {
    border-color: #8d72e1 !important;
}
.bg-primary, .btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .badge-primary, .nav-pills .nav-link.active, .pagination .active a, .custom-control-input:checked ~ .custom-control-label:before, #preloader #status .spinner > div, .social-icon li a:hover, .back-to-top:hover, .back-to-home a, ::selection, #topnav .navbar-toggle.open span:hover, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots.clickable .owl-dot:hover span, .watch-video a .play-icon-circle, .sidebar .widget .tagcloud > a:hover, .flatpickr-day.selected, .flatpickr-day.selected:hover, .tns-nav button.tns-nav-active, .form-check-input.form-check-input:checked {
    background-color: #8d72e1 !important;
}
.btn {
    padding: 8px 20px;
    outline: none;
    text-decoration: none;
    font-size: 16px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    font-weight: 600;
    border-radius: 5px;
}
.btn-primary {
    background-color: #8d72e1 !important;
    border: 1px solid #8D72E1 !important;
    color: #fff !important;
    box-shadow: 0 3px 7px rgb(109 199 122 / 50%);

}

a {
text-decoration:none;    
}
.btn{
    transition: all 0.3s ease;

}
.btn:hover{
    background-color: #8d72e1;
  transform: scale(1.05);
}

</style>



    

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container mt-5 pt-4">
    <div class="row align-items-end mb-4 pb-2">
        <div class="col-md-8">
            <div class="section-title text-center text-md-start">
                <h4 class="title mb-4">Find the perfect jobs</h4>
                <p class="text-muted mb-0 para-desc">Welcome to our job offers page! We are always looking for talented individuals to join our team, and we're excited to share our current job opportunities with you. Here, you'll find a list of our open positions along with their requirements and responsibilities.</div>
        </div><!--end col-->


@if(Auth::check() && Auth::user()->role=='hr' )

        <div class="col-md-4 mt-4 mt-sm-0 d-none d-md-block">
            <div class="text-center text-md-end">
                <a href="/offre/create" type="button" class="btn btn-primary btn-lg">Add Offre</a>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    @endif
    <div class="row ">
    @foreach ($offres as $offre )
    
        <div class="carte col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0  rounded shadow ">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">{{$offre->type_contrat}}</span>
                    <h5>{{$offre->titre}}</h5>
                    <div class="mt-3">
                        <span class="text-muted d-block"><i class="fa fa-home"style="color:#8d72e1" aria-hidden="true"></i> <a href="#" target="_blank" class="text-muted">{{$offre->societe}}</a></span>
                        <span class="text-muted d-block"><i class="fa fa-map-marker"style="color:#8d72e1" aria-hidden="true"></i>{{$offre->pays}}</span>
                        <span class="text-muted d-block">{{$offre->salair}}<i class="fas fa-euro-sign" style="color:#8d72e1" aria-hidden="true"></i></span>
                    </div>
                    
                    <div class="mt-3">
            <a href="/offre/{{$offre->slug}}" class="btn btn-primary " style="color:#8d72e1">View Details</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->
   

    @endforeach
</div>
</div>
@endsection