@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1604.71px;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
                @if(session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
                @endif
        </div>
        <!-- /.card -->

        <!-- Create Form -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add the positins for your advrtisement</h3>
            </div>
            <div class="card-body">
             
                <form action="{{route('positions.edit',['id' => $position->id])}}" method="PUT>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Position:</label>
                        <input type="text" name="position" id="position" class="form-control" value="{{ $position->position }}" required>
                    </div>
                
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active" @if ($position->status === 'active') selected @endif>Active</option>
                            <option value="inactive" @if ($position->status === 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update Position</button>
                    <a href="{{route('positions.index')}}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
