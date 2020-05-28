<div class="sidebar px-4 py-md-0">

        <h6 class="sidebar-title">Search</h6>
        <form class="input-group" action="" method="GET">
          @csrf

          <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
          <div class="input-group-addon">
            <span class="input-group-text"><i class="ti-search"></i></span>
          </div>
        </form>

        <hr>

        <h6 class="sidebar-title">Faculties</h6>
        <div class="row link-color-default fs-14 lh-24">
          
            @forelse ($faculties as $faculty)
            <div class="col-6">
                <a href="{{ route('facultyQuestion', $faculty->id) }}">
                  {{ $faculty->name }}
                </a>
            </div>
            @empty
                <h3 class="text-center">No Faculty Found</h3>
            @endforelse
          
        </div>

        <hr>

        <h6 class="sidebar-title">Departments</h6>
        <div class="gap-multiline-items-1">

            @forelse ($departments as $department)
            <a class="badge badge-secondary" href="{{ route('departmentQuestion', $department->id) }}">{{ $department->name }}</a>
            @empty
                <h3 class="text-center">No Departments Found</h3>
            @endforelse
         
        </div>

        <hr>

        


      </div>