@extends('dashboard.layouts.main')

@section('container')
<div class="container">
<div class="row  my-3">
    <div class="col-lg-8">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <a href="{{ url()->previous() }}" class="btn btn-primary"><span data-feather="arrow-left"></span> Back to my posts</a>
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-primary"><span data-feather="edit"></span> Edit this post</a>
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="border-0 btn btn-danger" onclick="confirm('are you sure?')"><span data-feather="trash"></span>Delete this post</button>
        </form>
        @if($post->image)
            <div style="max-height:350px; overflow:hidden;">
                <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid mb-3 mt-4" alt="{{ $post->category->name }}">
            </div>
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mb-3 mt-4" alt="{{ $post->category->name }}">
        @endif
       
        {!! $post->body !!}
      
    </div>
</div>
</div>
@endsection