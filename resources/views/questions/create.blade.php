@extends('layouts.app')

@section('content')

<div class="section bg-gray">
    <div class="container">
      <h1 class="text-center">My Page Header</h1>
      <div class="row justify-content-around">

        <div class="col-md-8">

                @include('partials.success')
                @include('partials.error')

            <card class="card-default">
                <div class="card-header">
                    <h3 class="text-center">{{ isset($question)? 'Update Question':'Add Question' }}</h3>
                </div>

                <div class="card-body">
                   <form action="{{ isset($question)? route('questions.update', $question) : route('questions.store') }}" method="post" enctype="multipart/form-data">
                       @csrf

                       @if (isset($question))
                           @method('PUT')
                       @endif

                       <div class="form-group">
                           <label for="course_title">Course Title:</label>
                           <input type="text" name="course_title" id="course_title" class="form-control" placeholder="E.g: GST111 - Communication in English 2017/2018" value="{{isset($question)? $question->course_title: '' }}">
                       </div>

                       <div class="form-group">
                        @if (isset($question))
                        <img src="/storage/{{ $question->front }}" class="img-responsive" style="width:120px; height:80px">
                        @endif

                           <label for="front">Front Page</label>
                           <input type="file" name="front" id="front" class="form-control" >
                       </div>

                       <div class="form-group">
                            @if (isset($question))
                                @if ($question->back)
                                <img src="/storage/{{ $question->back }}" class="img-responsive" style="width:120px; height:80px">
                                @endif
                            @endif
                            
                           <label for="back">Back Page</label>
                           <input type="file" name="back" id="back" class="form-control">
                       </div>

                       <div class="form-group">
                            @if (isset($question))
                                @if ($question->pdf)
                                <a href="/storage/{{$question->pdf}}" target="_blank">View PDF</a>
                                @endif
                            
                            @else
                           <label for="pdf">Select PDF</label>
                           @endif
                           <input type="file" name="pdf" id="pdf" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="faculty">Select Faculty</label>
                           <select name="faculty" id="faculty" class="form-control">
                               @foreach ($faculties as $faculty)
                                   <option value="{{ $faculty->id }}" 
                                       @if (isset($questioin))
                                       @if ($question->faculty_id == $faculty->id)
                                       selected
                                        @endif
                                       @endif>
                                       {{ $faculty->name }}
                                    </option>
                               @endforeach
                           </select>
                       </div>

                       <div class="form-group">
                            <label for="department">Select Department</label>
                            <select name="department" id="department" class="form-control">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        @if (isset($question))
                                        @if ($question->department_id == $department->id)
                                        selected
                                        @endif
                                        @endif>{{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-sm">Upload</button>
                       </div>
                   </form>
                </div>
            </card>
        </div>

      </div>
    </div>
  </div>
@endsection
