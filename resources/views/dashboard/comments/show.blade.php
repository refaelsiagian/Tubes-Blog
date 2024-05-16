@extends('dashboard.layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="my-3 pb-3 border-bottom">Comment</h2>

            <div id="commentList" class="mt-3">
                <div class="comment">
                    <a href="/user/username " class="text-decoration-none text-dark">
                        <strong>username</strong>
                    </a>
                    -
                    <small>4 days ago</small>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8 pb-5">
            <h3 class="my-3 pb-3 border-bottom">Judul</h3>
            <img src="https://source.unsplash.com/1200x400?category" class="img-fluid" alt="category">
            <p class="text-secondary text-lg mt-3">
                By <a href="/user/username" class="text-decoration-none">Username</a> 
                in <a href="/categories/category_slug" class="text-decoration-none">Category Name</a>
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pom dolor sit amet consectetur adipisicing elit.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pom dolor sit amet consectetur adipisicing elit.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pom dolor sit amet consectetur adipisicing elit.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pom dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="{{ route(($active === 'admin-comments') ? 'admin.comments.index' : 'dashboard.comments.index') }}" class="text-decoration-none">
                Back to 
                @if($active === 'admin-comments') All Comments
                @else My Posts' Comments @endif
            </a>
        </div>
    </div>
</div>

@endsection