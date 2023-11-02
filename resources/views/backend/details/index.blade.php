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
          <a href="{{route('newsdetails.create')}}">
            <button type="button" class="btn btn-block bg-gradient-success ">Add New</button>

          </a>

        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          ID
                      </th>
                      
                      <th>
                          Category Name
                      </th>
                      <th>
                          Trending News
                      </th>
                      <th>
                          Photo
                      </th>
                      <th>
                        News Head
                    </th>
                    <th>
                      News Starter
                  </th>
                  <th>
                    News Description
                </th>
                <th>
                  Status
              </th>
                      <th style="width: 8%" class="text-center">
                        Action
                    </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($details as $detail)
                <tr>
                    <td>{{$detail->id}}</td>
                    <td>{{$detail->category_name}}</td>
                    <td>{{$detail->trendnews}}</td>
                    <td>
                      @if($detail->photo)
                      <img src="{{ asset('images/'.$detail->photo) }}" alt="About Photo">

                                      @else 
                                      <span>No image found!</span>
                                      @endif
                    </td>
                      <td>{{$detail->newshead}}</td>
                      <td>{{$detail->newsstart}}</td>
                      <td>{{$detail->description}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{route('newsdetails.edit', ['id' => $detail->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form action="{{route('newsdetails.delete', ['id' => $detail->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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