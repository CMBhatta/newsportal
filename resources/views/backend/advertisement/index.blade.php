@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1604.71px;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">News Detail Section</h3> <br><br>
          @if(session()->has('success'))
          <div>
              {{session('success')}}
          </div>
          @endif

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div>
          <a href="{{route('advertisements.create')}}">
            <button type="button" class="btn btn-block bg-gradient-success ">Add New</button>

          </a>

        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Position</th>
                  <th>Description</th>
                  <th>URL</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
          </thead>
        <tbody>
            @foreach ($advertisements as $advertisement)
                <tr>
                    <td>{{ $advertisement->id }}</td>
                    <td>{{ $advertisement->title }}</td>
                    <td>{{ $advertisement->position->position_id }}</td>
                    <td>{{ $advertisement->description }}</td>
                    <td>{{ $advertisement->url }}</td>
                    <td>{{ $advertisement->start_date }}</td>
                    <td>{{ $advertisement->end_date }}</td>
                    <td>{{ $advertisement->status }}</td>
                    <td>
                      
                        <a href="" class="btn btn-primary">Edit</a>
                        <form action="" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this advertisement?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
          </table>
          <div class="row">
        </div>
        
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection