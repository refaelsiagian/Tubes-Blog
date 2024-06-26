@extends('blog.layouts.main')

@section('content')
<div class="container">

    <h2 class="text-center my-5">{{ $title }}</h2>

    <div class="row justify-content-center">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white fs-8 rounded" style="background-color: rgba(0, 0, 0, 0.3)">
                        <a href="/categories/{{ $post->category->category_slug }}" class="text-white text-decoration-none">{{ $post->category->category_name }}</a>
                    </div>
                    @if($post->image)
                    <img src=" {{ asset('storage/' . $post->image) }}" style="height: 13em; overflow: hidden;" class="card-img-top" alt="{{ $post->title }}" >
                    @else
                    <img src="https://picsum.photos/seed/{{ $post->category->category_name }}/500/300" class="card-img-top" alt="{{ $post->category->category_name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title d-flex align-items-center" style="height: 3em; overflow: hidden;">{{ $post->title }}</h5>
                        <p>
                            <small>
                                By <a href="/user/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> 
                                {{ $post->updated_at->diffForHumans() }} | 
                                <i class="bi bi-eye"></i> {{ $post->view }}
                            </small>
                            @if($post->user->role == 'admin') <span class="badge text-bg-success">Admin</span> @endif
                        </p>
                        <p class="card-text d-flex align-items-center" style="height: 8em; overflow: hidden;">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more..</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection