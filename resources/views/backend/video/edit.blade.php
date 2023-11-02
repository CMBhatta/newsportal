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
                <h3 class="card-title">Edit Videos</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('videos.update', ['id' => $video->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name"> Category Name:</label>
                        <input type="text" name="category_name" id="name" class="form-control" value="{{ $video->category_name }}" optional>
                    </div>
                    <div class="form-group">
                        <label for="description">Video Title</label>
                        <textarea class="form-control" id="title" name="title" rows="3">{{ $video->title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ $video->url }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Video Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $video->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active" @if ($video->status === 'active') selected @endif>Active</option>
                            <option value="inactive" @if ($video->status === 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('videos.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
