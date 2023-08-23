@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Posts by {{ auth()->user()->name }}</h1>
</div>

  <div class="table-responsive col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-dark text-white mb-3">Create new post</a>
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
          {{ session('success') }}
      </div>
      @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info">
                <span data-feather="eye"></span>
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning">
                <span data-feather="edit"></span>
            </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="border-0 badge bg-danger" onclick="return confirm('are you sure to delete this post?')"><span data-feather="trash"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection