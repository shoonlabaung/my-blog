@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
            
            <div class="mt-3">
                <h3 class="mt-4 d-inline">Posts</h3>
                <a href="{{route('admin.posts.index')}}" class="btn btn-danger float-end">Cancel</a>
            </div>
            
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="">Posts</a></li>
                <li class="breadcrumb-item active">Post Create</li>

            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Create Posts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                <div class="alert alert-danger">
                     @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                    @endforeach
                  </div>
                   @endif
                        <input type="hidden" name="user_id" value="{{ auth()->id() ?? 1 }}">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="category_id">Categories</label>
                            <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                                <option selected>Choose....</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach  
                                
                            </select>
                        </div>
                       
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>


                        <div class="mb-3">
                            <label for="user_id">Author</label>
                            <select class="form-select" id="user_id" name="user_id" aria-label="Default select example">
                                <option selected>Choose....</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach  
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection