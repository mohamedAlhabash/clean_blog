@extends('admin.layouts.master')

@section('content')
<div class="content-header">
    @if (session('success'))
    <div class="alert alert-{{ session('type')}} alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">All Posts</h1>
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
                  <h3 class="card-title">All Posts</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Image</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post )
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->subtitle}}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $post->image)}}" alt="{{ $post->title }}" width="80px" height="80px">
                            </td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <form class="d-inline"action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                                    @method("delete")
                                    @csrf
                                   <button onclick="return confirm ('Are You Sure?')" class="btn btn-danger btn-sm btn-lg ">Delete</button>
                                    </form>
                                {{-- <a href="{{route('admin.posts.destroy',$category->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
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
