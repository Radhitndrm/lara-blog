@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
</div>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/dashboard?category={{ $category->slug }}">
                    <div class="card text-bg-dark">
                        <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img justify-content" alt="{{ $category->name }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">
                            {{ $category->name }}
                        </h5>
                        </div>
                    </div>
               </a>
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
