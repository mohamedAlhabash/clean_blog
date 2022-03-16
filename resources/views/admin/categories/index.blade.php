@extends('admin.layouts.master')

@section('content')
<div class="content-header">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">All Categories</h1>
      </div>
    </div>
</div>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Categories</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <form class="d-inline"action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                                    @method("delete")
                                    @csrf
                                   <button onclick="return confirm ('Are You Sure?')" class="btn btn-danger btn-sm btn-lg ">Delete</button>
                                    </form>
                                {{-- <a href="{{route('admin.categories.destroy',$category->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</div>
</div>

@stop
