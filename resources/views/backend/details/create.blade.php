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
                <h3 class="card-title">Add news details</h3>
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
                <form method="POST" action="{{ route('newsdetails.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category_name"> <!-- Change 'name' attribute -->
                             @foreach($categories as $category)
                            <option value="{{ $category->category_name }}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="trendnews">Today's trending news</label>
                        <textarea class="form-control" id="trendnews" name="trendnews" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="photo">News Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="form-group">
                        <label for="newshead">News heading</label>
                        <textarea class="form-control" id="newshead" name="newshead" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="newsstart">News starting</label>
                        <textarea class="form-control" id="newsstart" name="newsstart" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">News Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="status">Status</label>
                        <input type="checkbox" id="status" name="status" value="1" checked>
                    </div> --}}
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
