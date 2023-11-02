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
                <h3 class="card-title">Add Video</h3>
            </div>
            <div class="card-body">
                <form action="{{route('videos.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <label for="name">Category</label>
        
                    <select name="category_name"> <!-- Change 'name' attribute -->
                      
                        @foreach($categories as $category)
                        <option value="{{ $category->category_name }}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="form-group">
                        <label for="description">Video Title</label>
                        <textarea class="form-control" id="title" name="title" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL or Embed Code</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                        {!! '<small class="form-text text-muted">Enter a video URL or an &lt;iframe&gt; embed code.</small>' !!}
                    </div>
                    <div class="form-group">
                        <label for="description">Video Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Create Video</button>
                    <a href="" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
