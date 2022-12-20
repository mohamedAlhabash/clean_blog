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
                                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title)}}" placeholder="Title">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $post->subtitle)}}"
                                            placeholder="Subtitle">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <textarea class="form-control" name="content" rows="5" palceholder="Content">{{ $post->content }}</textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" name="image" class="form-control">
                                        <img src="{{ asset('uploads/'. $post->image)}}" alt="{{ $post->title}}" width="100px" height="100px">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <select name="user_id" value="{{ old('user_id', $post->user_id)}}" class="form-control">
                                            <option value="" disabled selected> Select user</option>
                                            @foreach ($users as $user)
                                                <option {{ $post->user_id == $user->id ? 'selected' : null }}  value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select name="category_id" value="{{ old('category_id', $post->category_id)}}" class="form-control">
                                            <option value="" disabled selected> Select category</option>
                                            @foreach ($categories as $category)
                                                <option {{ $category->id == $post->category_id ? 'selected' : null }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
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
