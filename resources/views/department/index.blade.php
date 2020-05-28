@extends('layouts.app')

@section('content')

<div class="section bg-gray">
    <div class="container">
      <h1 class="text-center">My Page Header</h1>
      <div class="row justify-content-around">

        <div class="col-md-8">

                @include('partials.success')
                @include('partials.error')
            
            <div class="d-flex justify-content-center my-4">
                <a href="{{ route('department.create') }}" class="btn btn-success">Add Department</a>
            </div>

            <card class="card-default">
                <div class="card-header">
                    <h4 class="text-center">Departments</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>No. of Ques</th>
                                <th></th>
                                <th></th>
                            </thead>

                            @forelse ($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->questions->count() }}</td>
                                    <td><a href="{{ route('department.edit', $department->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        
                                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $department->id}})">Delete</button>
                                    
                                        
                                    </td>
                                </tr>
                            @empty
                                <h3 class="text-center">No department Found</h3>
                            @endforelse
                        </table>
                    </div>
                </div>
            </card>
            {{ $departments->links() }}

            <form action="" method="post" id="deleteDepartment">
                    @csrf
                    @method('DELETE')
        
                    <!-- Modal -->
                <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
  </div>
@endsection

@section('scripts')
    <script>

        function handleDelete(id){
            var deleteForm = document.getElementById('deleteDepartment');
            deleteForm.action = '/department/' + id;
            $('#deleteDepartmentModal').modal('show');

        }

    </script>
@endsection