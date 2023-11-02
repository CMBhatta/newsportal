@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1604.71px;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Positions list</h3> <br><br>
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
            <a href="{{ route('positions.create') }}" class="btn btn-success">Add Position</a>


        </div>
        <div class="card-body p-0">
     
            <table class="table">
                <thead>
                    <tr>
                        <th> Position</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{ $position->position }}</td>
                            <td>{{ $position->slug }}</td>
                            <td>{{ ucfirst($position->status) }}</td>
                            <td>
                             
                              <a href="{{ route('positions.edit', $position->id) }}">Edit</a>

                                <form action="{{ route('positions.delete',$position->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this position?')">Delete</button>
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