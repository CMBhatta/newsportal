@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1604.71px;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            @if(session()->has('success'))
            <div class="card-header">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
            @endif
        </div>
        <!-- /.card -->

        <!-- Edit Form -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name"> Category Name:</label>
                        <input type="text" name="category_name" id="name" class="form-control" value="{{ $category->category_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active" @if ($category->status === 'active') selected @endif>Active</option>
                            <option value="inactive" @if ($category->status === 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
