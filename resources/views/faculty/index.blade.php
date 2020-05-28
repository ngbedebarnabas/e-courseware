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
                <a href="{{ route('faculty.create') }}" class="btn btn-success">Add Faculty</a>
            </div>

            <card class="card-default">
                <div class="card-header">
                    <h4 class="text-center">Faculties</h3>
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

                            @forelse ($faculties as $faculty)
                                <tr>
                                    <td>{{ $faculty->name }}</td>
                                    <td>{{ $faculty->questions->count() }}</td>
                                    <td><a href="{{ route('faculty.edit', $faculty->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route('faculty.destroy', $faculty->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @empty
                                <h3 class="text-center">No Faculty Found</h3>
                            @endforelse
                        </table>
                    </div>
                </div>
            </card>
        </div>

      </div>
    </div>
  </div>
@endsection
