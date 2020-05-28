@extends('layouts.app')

@section('content')

<div class="section bg-gray">
    <div class="container">
      <h1 class="text-center">My Page Header</h1>
      <div class="row">

        <div class="col-md-12">

                @include('partials.success')
                @include('partials.error')
            
            <div class="d-flex justify-content-center my-4">
                <a href="{{ route('questions.create') }}" class="btn btn-success">Add Question</a>
            </div>

            <card class="card-default">
                <div class="card-header">
                    <h3 class="text-center">List of Questions</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Course Title</th>
                                <th>Front</th>
                                <th>Back</th>
                                <th>PDF</th>
                                <th>Faculty</th>
                                <th></th>
                                <th></th>
                            </thead>

                           @forelse ($questions as $question)
                               <tr>
                                   <td>{{ $question->course_title }}</td>
                                   <td><img src="storage/{{ $question->front }}" alt="front-page" style="width:90px; height:50px;"></td>
                                   <td>@if (!$question->back)
                                       No Back Page
                                   @else
                                   <img src="storage/{{ $question->back }}" alt="back-page" style="width:120px; height:50px;">
                                   @endif</td>

                                   <td>@if ($question->pdf)
                                    <a href="storage/{{ $question->pdf }}">View PDF</a>
                                   @else
                                    No PDF
                                   @endif</td>

                                   <td>{{ $question->faculty->name }}</td>
                                   <td><a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                                   <td><button class="btn btn-danger btn-sm" onclick="deleteQuestion({{$question->id}})">Delete</button></td>
                               </tr>
                           @empty
                               <h3 class="text-center">No Questions</h3>
                           @endforelse

                        </table>
                    </div>
                </div>
                {{ $questions->links() }}
            </card>
        </div>

        <form action="" method="post" id="deleteForm">
            @csrf
            @method('DELETE')

            <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        
              <div class="modal-body">
                <p class="text-center text-bold">Are you sure you want to delete this Question ?</p>
              </div>
        
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Confirm Delete</button>
              </div>
            </div>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script>

        function deleteQuestion(id){
            var dForm = document.getElementById('deleteForm');
            dForm.action = '/questions/' + id;
            $('#deleteModal').modal('show');

        }

    </script>
@endsection