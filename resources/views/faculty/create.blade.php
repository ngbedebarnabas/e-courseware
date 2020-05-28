@extends('layouts.app')

@section('content')

<div class="section bg-gray">
    <div class="container">
      <h1 class="text-center">My Page Header</h1>
      <div class="row justify-content-around">

        <div class="col-md-8">
            
            @if (!isset($faculty))
            <div class="d-flex justify-content-center my-4">
                <a href="{{ route('faculty.create') }}" class="btn btn-success">Add Faculty</a>
            </div>    
            @endif

            <card class="card-default">
                <div class="card-header">
                    <h4 class="text-center">{{ isset($faculty)? 'Edit Faculty' : 'Add Faculty'}}</h3>
                </div>

                <div class="card-body">

                    @include('partials.error')

                   <form action="{{ isset($faculty)? route('faculty.update', $faculty): route('faculty.store') }}" method="post">
                       @csrf

                       @if (isset($faculty))
                           @method('PUT')
                       @endif

                       <div class="form-group">
                           <label for="name">Faculty Name:</label>
                           <input type="text" name="name" id="name" class="form-control" placeholder="Faculty Name" value="{{ isset($faculty)? $faculty->name : '' }}">
                       </div>

                       <div class="form-group">
                           <button type="submit" class="btn btn-success ">
                               {{ isset($faculty)? 'Update Faculty' : 'Create Faculty'}}
                           </button>
                       </div>
                   </form>
                </div>
            </card>
        </div>

      </div>
    </div>
  </div>
@endsection
