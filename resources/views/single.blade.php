@extends('layouts.template')

@section('title')
    e-CourseWare
@endsection


@section('header')
    

<!-- Header -->
<header class="header text-white" style="background-color: #b9a0c9;">
  <div class="container text-center">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <h3>{{ $question->course_title }}</h3>
        <p class="lead-2 opacity-90 mt-2">Click Question to Zoom, or Click the Download as PDF link. Scroll to See Comments from other students and/or comment on this.</p>

      </div>
    </div>

  </div>
</header><!-- /.header -->



@endsection

@section('content')
<!-- Main Content -->
<main class="main-content">

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-9">

      {{-- lightbox --}}

     <div class="container">
        
    <div class="row text-center justify-content-around">
      
        <div class="col-md-6  text-center">
        
                <a href="/storage/{{ $question->front }}" data-provide="lightbox">
                    <img src="/storage/{{ $question->front }}" alt="Front Page" style="width:100%; height: 100%">
                </a>
        </div>
        
        @if ($question->back)
        <div class="col-md-6  text-center">
        
                <a href="/storage/{{ $question->back }}" data-provide="lightbox">
                    <img src="/storage/{{ $question->back }}" alt="Back Page" style="width:100%; height: 100%">
                </a>
        </div>

        @endif
        @if ($question->pdf)
        <a href="/storage/{{$question->pdf }}" download target="_blank" class="btn btn-primary btn-block mt-3">Download as PDF</a>
        @endif
    </div>
</div>

            </div>
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
        </div>
    </div>


</main>

@endsection