@extends('admin.layouts.master')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Update Category</h1>
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
                        <div class="card-body">
                            <form action="{{route('admin.categories.update',$category->id)}}" method="POST">
                            @csrf @method('put')
                            <input type="text" class="form-control mb-3" name="name" placeholder="Category Name" value="{{$category->name}}">
                            <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
