@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
</div>
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/dashboard">
             
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
    <div class="card mb-3">
        @if($posts[0]->image)
        <div style="max-height:350px; overflow:hidden;">
            <img src="{{ asset('storage/'.$posts[0]->image) }}" class="img-fluid mb-3" alt="{{ $posts[0]->category->name }}">
        </div>
         @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top justify-content" alt="{{ $posts[0]->category->name }}">
         @endif
       
        <div class="card-body text-center">

            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                {{ $posts[0]->title }}
            </a></h3>
            <p>By<a href="/dashboard?author={{$posts[0]->author->username}}" class="text-decoration-none"> {{ $posts[0]->author->name }}
                </a> in <a href="/dashboard?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> 
                {{ $posts[0]->created_at->diffForHumans() }} 
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            
            <a href="/dashboard/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

        </div>
      </div>
    

      <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                
          
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="position-absolute bg-dark px-3 py-2"> 
                        <a href="/dashboard?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
                    </div>
                    @if($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid mb-3" alt="{{ $post->category->name }}">
                   @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mb-3 mt-4" alt="{{ $post->category->name }}">
                    @endif
                    
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p>By<a href="/dashboard?author={{$post->author->username}}" class="text-decoration-none"> {{ $post->author->name }}
                      </a>
                     {{ $post->created_at->diffForHumans() }} 
                        </p>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/dashboard/posts/{{ $post->slug }}" class="text-decoration-none btn btn-primary">read more</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
   
    @else
    <p class="text-center fs-4">No post found.</p> 
   @endif

   {{ $posts->links() }}
@endsection