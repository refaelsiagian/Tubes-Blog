@extends('layouts.main')

@section('content')

{{-- KOLOM KOMENTAR DI BARIS 27 --}}

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 pb-5">
                <h2 class="my-3 pb-3 border-bottom">{{ $post->title }}</h2>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->category_name }}" class="img-fluid" alt="{{ $post->category->name }}">
                <p class="text-secondary text-lg mt-3">
                    By <a href="/user/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> 
                    in <a href="/categories/{{ $post->category->category_slug }}" class="text-decoration-none">{{ $post->category->category_name }}</a>
                </p>
                {!! $post->body !!}
                <a href="/posts" class="text-decoration-none">Back to Blog</a>
            </div>
            <div class="col-md-8">
                <h3 class="my-3 pb-3 border-bottom">Comments</h3>
                <form action="#">
                    <textarea class="form-control" id="comment" rows="2" placeholder="Enter your comment"></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>

                <div id="commentList" class="mt-3">
                    {{-- Loop bagian ini --}}
                    <div class="comment">
                        <a href="/user/refaelsiagian" class="text-decoration-none text-dark">
                            <strong>@refaelsiagian</strong>
                        </a>
                        -
                        <small>23 hours ago</small>
                        <p>
                            This is a great article! I will definitely read it again.
                            Because I love it. Thank you! But, I will not read it again.
                            Because I hate it. Thank you! But, I will not read it again.
                            Because I hate it. Thank you! But, I will not read it again.
                            Because I hate it. Thank you! But, I will not read it again.
                            Because I hate it. Thank you!
                        </p>
                    </div>
                    {{-- Sampai sini --}}
                </div>
            </div>
        </div>
    </div>

@endsection