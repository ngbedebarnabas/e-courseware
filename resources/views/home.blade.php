@extends('layouts.app')

@section('content')

<div class="section bg-gray">
    <div class="container">
      <h1 class="text-center">My Page Header</h1>
      <div class="row">


        <div class="col-md-8 col-xl-9">
          <div class="row gap-y">

          @forelse ($questions as $question)
          <div class="col-md-6">
            <div class="card border hover-shadow-6 mb-6 d-block">

              <div class="p-6 text-center">
                <p>
                  <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{ route('facultyQuestion', $question->faculty_id) }}">{{ $question->faculty->name }}</a>
                </p>
                <h5 class="mb-0">
                  <a class="text-dark" href="{{ route('questions.show', $question->id) }}">{{ $question->course_title }}</a>
                </h5>
              </div>
            </div>
          </div>

          @empty
              <h3 class="text-center">No Question Found for <strong>{{ request()->query('search') }}</strong></h3>
          @endforelse

        </div>


          {{-- <nav class="flexbox mt-30">
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
            <a class="btn btn-white" href="#">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
          </nav> --}}

          {{ $questions->appends(['search' => request()->query('search')])->links() }}

        </div>



        <div class="col-md-4 col-xl-3">

         @include('partials.sidebar')
         
        </div>

      </div>
    </div>
  </div>
@endsection
