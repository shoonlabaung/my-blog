@extends('layouts.front')
@section('content')
       <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">welcome to our Blog post.</p>
                </div>
            </div>
        </header>
        
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    @if($featured)
                  <div class="card mb-4">
                 <a href="#!"><img class="card-img-top" src="{{asset('storage/'.$featured->image)}}" alt="..." /></a>
                 <div class="card-body">
                 <div class="small text-muted">{{ $featured->created_at->format('F d, Y') }}</div>
                <h2 class="card-title">{{ $featured->title }}</h2>
                  <p class="card-text">{{ $featured->description }}</p>
                   <a class="btn btn-primary" href="'{{route('front.detail',$featured->id)}}">Read more →</a>
              </div>
             </div>
                 @endif
                    
                
                    <div class="row">
                         @foreach($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="{{asset('storage/'.$post->image)}}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $post->created_at->format('F d, Y') }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{{ $post->description }}</p>
                                    <a class="btn btn-primary" href="{{route('front.detail',$post->id)}}">Read more →</a>
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>
                 
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                  
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($categories as $category)
                                            <li><a href="#!">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@endsection