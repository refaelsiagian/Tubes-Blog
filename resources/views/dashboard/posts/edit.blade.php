@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
  
<div class="col-lg-8">
    <form id="trix-form" action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required autofocus value="{{ $post->title }}">
        </div>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id" id="category">
                @foreach ($categories as $category)
                    @if(old('category_id') == $category->id || $post->category_id == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endif
                @endforeach
            </select>        
        </div>
        @error('category_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}"> {{-- menambahkan nama gambar lama tetapi disembunyikan/hidden --}}
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5" style="width: 100px;">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ $post->body }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <p id="word-count-message" class="text"></p>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <button type="button" class="btn btn-primary" onclick="confirmSubmit('published')">Publish</button>
        <button type="button" class="btn btn-secondary" onclick="confirmSubmit('draft')">Draft</button>
    </form>  
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }

    function countWords(str) {
        return str.trim().split(/\s+/).filter(function(word) {
            return word.length > 0;
        }).length;
    }

    document.addEventListener('trix-change', function(event) {
        const editor = event.target;
        const wordCount = countWords(editor.editor.getDocument().toString());
        const messageElement = document.getElementById('word-count-message');
        
        messageElement.textContent = `${wordCount} kata`;
    });

    function confirmSubmit(status) {
        const editor = document.querySelector('trix-editor');
        const wordCount = countWords(editor.editor.getDocument().toString());
        
        if (status === 'published' && wordCount < 500) {
            alert('Konten harus lebih dari 500 kata untuk dipublish.');
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to submit this post as ${status}.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('trix-form');
                const statusInput = document.createElement('input');
                statusInput.setAttribute('type', 'hidden');
                statusInput.setAttribute('name', 'status');
                statusInput.setAttribute('value', status);
                form.appendChild(statusInput);
                form.submit();
            }
        });
    }
</script>

    
@endsection
