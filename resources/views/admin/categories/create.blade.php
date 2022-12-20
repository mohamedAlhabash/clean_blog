@extends('admin.layouts.master')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add New Category</h1>
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
                            <form action="{{route('admin.categories.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" value="{{ old('name')}}" name="name" placeholder="Category Name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
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
