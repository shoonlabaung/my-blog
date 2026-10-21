@extends('layouts.front')
@section('content')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->format('F d, Y') }}</div>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('storage/'.$post->image)}}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <h2 class="card-title h4">{{ $post->title }}</h2>
                            <p class="fs-5 mb-4">{{ $post->description }}</p>
                        </section>
                    </article>
                </div>
             </div>
              </div>
@endsection
