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
      <!-- Create Form -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Position</h3>
        </div>
        <div class="card-body">
            <form action="{{route('positions.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Position:</label>
                    <input type="text" name="position" id="position" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{route('positions.index')}}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>
@endsection
