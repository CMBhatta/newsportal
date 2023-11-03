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

        <!-- Edit Form -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Advertisement</h3>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @else
        <div class="alert alert-danger">
            <ul>
                    <li>NO issue  

                        @if(request()->session()->has('success_message'))
                        {{request()->session()->get('success_message')}}
                        @endif
                        {{$errors}}
                    </li>
            </ul>
        </div>
        @endif
            <div class="card-body">
                <form action="{{ route('advertisements.update', $advertisement->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required value="{{ $advertisement->title }}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{ asset('images/'.$advertisement->image) }}" alt="About Image" >
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="position">Position</label>
                        <select name="position_id" id="position_id" class="form-control">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ $advertisement->position_id == $position->id ? 'selected' : '' }}>{{ $position->position }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ $advertisement->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url" class="form-control" required value="{{ $advertisement->url }}">
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ $advertisement->start_date ? \Carbon\Carbon::parse($advertisement->start_date)->format('Y-m-d\TH:i') : '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ $advertisement->end_date ? \Carbon\Carbon::parse($advertisement->end_date)->format('Y-m-d\TH:i') : '' }}">
                    </div>
                    

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{ $advertisement->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $advertisement->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Advertisement</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
