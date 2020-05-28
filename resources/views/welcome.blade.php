@extends('layouts.template')

@section('title')
    e-CourseWare
@endsection



@section('header')
    
<!-- Header -->
<header class="header text-white" style="background-image: url({{ asset('img/2.jpg')}})" data-overlay="8">
  <div class="container text-center">

    <div class="row">
      <div class="col-lg-8 mx-auto">

        <h1>e-CourseWare: <span class="text-primary" data-typing="Built Just For You!, Learn Share Socialize, Advertise Here , Boost your Business"></span></h1>
        <p class="lead-2 mt-5">You have got the change to work and thrive with us. We are a small group of developers who wants to make a family!</p>

        <hr class="w-60px my-7">

        <a class="btn btn-lg btn-round btn-white" href="{{ route('register') }}">Join Now</a>

      </div>
    </div>

  </div>
</header><!-- /.header -->

@endsection

@section('content')
<!-- Main Content -->
<main class="main-content">

{{-- gallery --}}
  
    <section class="section">
        <h1 class="text-center">Gallery</h1>
        <div data-provide="slider" data-autoplay="true" data-slides-to-show="2" data-css-ease="linear" data-speed="12000" data-autoplay-speed="0" data-pause-on-hover="false">
          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{ asset('img/2.jpg') }})"></div>
          </div>

          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{ asset('img/4.jpg') }})"></div>
          </div>

          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{ asset('img/9.jpg') }})"></div>
          </div>

          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{ asset('img/10.jpg') }})"></div>
          </div>
        </div>
    </section>

      {{-- lightbox --}}

     <div class="container">
            <h6 class="divider mt-4">LightBox</h6>
        <div class="row">
            <div class="col-md-4  text-center">
               <div class="card card-default">
                    <div class="card-image">
                        <a href="{{ asset('img/4.jpg')}}" data-provide="lightbox">
                            <img src="{{ asset('img/4.jpg')}}" alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum modi et voluptas deleniti exercitationem sint, placeat eaque quod vero perspiciatis.
                        </p>
                    </div>
               </div>
            </div>

            <div class="col-md-4  text-center">
            <div class="card card-default">
                    <div class="card-image">
                        <a href="{{ asset('img/4.jpg')}}" data-provide="lightbox">
                            <img src="{{ asset('img/4.jpg')}}" alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum modi et voluptas deleniti exercitationem sint, placeat eaque quod vero perspiciatis.
                        </p>
                    </div>
            </div>
            </div>
            <div class="col-md-4  text-center">
                <div class="card card-default">
                        <div class="card-image">
                            <a href="{{ asset('img/4.jpg')}}" data-provide="lightbox">
                                <img src="{{ asset('img/4.jpg')}}" alt="...">
                            </a>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum modi et voluptas deleniti exercitationem sint, placeat eaque quod vero perspiciatis.
                            </p>
                        </div>
                </div>
                </div>
        </div>
    </div>

    {{-- blog section --}}

    <section class="section">
        <div class="container">
            <div class="row gap-y align-items-center">
    
            <div class="col-md-5 mx-auto">
                <img class="rounded" src="{{ asset('img/9.jpg')}}" alt="...">
            </div>


            <div class="col-md-6 text-center text-md-left">
                <h3>Convert your visitors to real customers</h3>
                <p>Option as can distributors. And to suppliers, given a copy the horrible arrange yes, we had hundreds leave was more which a I the king's had the so soon throughout in necessary which at way did phase a young written, descriptions, late uninspired, to times owner themselves them. Get sported uninspired, the a box to an to but on been the succeed have couldn't set.</p>
                <br>
                <a class="btn btn-outline-primary" href="#">Read More <i class="ti-arrow-right fs-9 ml-2"></i></a>
            </div>
    
            </div>
        </div>
    </section>


</main>

@endsection