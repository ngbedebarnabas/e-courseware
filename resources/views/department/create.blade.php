@extends('layouts.app')

@section('content')

<div class="section bg-gray">
    <div class="container">
      <h1 class="text-center">My Page Header</h1>
      <div class="row justify-content-around">

        <div class="col-md-8">
            
            @if (!isset($department))
            <div class="d-flex justify-content-center my-4">
                <a href="{{ route('department.create') }}" class="btn btn-success">Add Department</a>
            </div>    
            @endif

            <card class="card-default">
                <div class="card-header">
                    <h4 class="text-center">{{ isset($department)? 'Edit Department' : 'Add Department'}}</h3>
                </div>

                <div class="card-body">

                    @include('partials.error')

                   <form action="{{ isset($department)? route('department.update', $department): route('department.store') }}" method="post">
                       @csrf

                       @if (isset($department))
                           @method('PUT')
                       @endif

                       <div class="form-group">
                           <label for="name">Department Name:</label>
                           <input type="text" name="name" id="name" class="form-control" placeholder="Department Name" value="{{ isset($department)? $department->name : '' }}">
                       </div>

                       <div class="form-group">
                           <button type="submit" class="btn btn-success ">
                               {{ isset($department)? 'Update department' : 'Create department'}}
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
