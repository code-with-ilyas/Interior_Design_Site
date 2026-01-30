@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Blog Post Header -->
            <article class="blog-post">
                @if($blog->image)
                    <div class="post-image mb-4">
                        <img src="{{ Storage::url($blog->image) }}"
                             alt="{{ $blog->title }}"
                             class="img-fluid rounded"
                             style="width: 100%; height: 400px; object-fit: cover;">
                    </div>
                @endif

                <div class="post-header mb-4">
                    <div class="post-meta d-flex d-flex justify-content-between align-items-center">

                        <small class="text-muted">
                            By Admin.
                            {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                        </small>
                         <span class="text-muted">
                            {{ $blog->category->name ?? 'General' }}
                        </span>
                    </div>

                    <h1 class="post-title">{{ $blog->title }}</h1>

                    @if($blog->excerpt)
                        <p class="post-excerpt lead">{{ $blog->excerpt }}</p>
                    @endif
                </div>

                <!-- Post Content -->
                <div class="post-content">
                    {!! nl2br(e($blog->body)) !!}
                </div>

                <!-- Post Images Gallery -->
                @if($blog->images->count() > 0)
                    <div class="post-gallery mt-5">
                        <h3 class="mb-4">Gallery</h3>
                        <div class="row g-3">
                            @foreach($blog->images as $image)
                                <div class="col-md-6 col-lg-4">
                                    <div class="gallery-item">
                                        <img src="{{ Storage::url($image->image) }}"
                                             alt="{{ $image->alt_text ?? $blog->title }}"
                                             class="img-fluid rounded"
                                             style="width: 100%; height: 200px; object-fit: cover;">
                                        @if($image->alt_text)
                                            <small class="text-muted d-block mt-2">{{ $image->alt_text }}</small>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </article>

            <!-- Back to Blog Link -->
            <div class="mt-5">
                <a href="#blog" class="th-btns black-border">
                    ← Back to Blog
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar">
                <!-- Related Posts -->
                @if($relatedPosts->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Related Posts</h5>
                        </div>
                        <div class="card-body">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="related-post mb-3 pb-3 border-bottom">
                                    @if($relatedPost->image)
                                        <div class="related-post-image mb-2">
                                            <img src="{{ Storage::url($relatedPost->image) }}"
                                                 alt="{{ $relatedPost->title }}"
                                                 class="img-fluid rounded"
                                                 style="width: 100%; height: 120px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <h6 class="related-post-title">
                                        <a href="{{ route('blog.show', $relatedPost) }}"
                                           class="text-decoration-none">
                                            {{ $relatedPost->title }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        {{ $relatedPost->published_at ? $relatedPost->published_at->format('M d, Y') : $relatedPost->created_at->format('M d, Y') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Categories -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach(App\Models\BlogCategory::withCount('posts')->get() as $category)
                                @if($category->posts_count > 0)
                                    <li class="mb-2">
                                        <a href="{{ route('blog.category', $category) }}"
                                           class="text-decoration-none">
                                            {{ $category->name }}
                                            {{-- <span class="badge bg-secondary float-end">{{ $category->posts_count }}</span> --}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.post-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    line-height: 1.2;
}

.post-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
}

.post-content p {
    margin-bottom: 1.5rem;
}

.related-post-title a {
    color: #333;
    transition: color 0.3s ease;
}

.related-post-title a:hover {
    color: #003f3a;
}

.sidebar .card {
    border: 1px solid #eee;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.badge.bg-secondary {
    background-color: #6c757d !important;
}

/* Ensure sidebar categories are visible */
.sidebar .card ul.list-unstyled {
    margin: 0;
    padding: 0;
}

.sidebar .card ul.list-unstyled li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.sidebar .card ul.list-unstyled li:last-child {
    border-bottom: none;
}

.sidebar .card ul.list-unstyled li a {
    color: #333;
    text-decoration: none;
    display: block;
    transition: color 0.3s ease;
}

.sidebar .card ul.list-unstyled li a:hover {
    color: #003f3a;
}

.sidebar .card ul.list-unstyled li .badge {
    background-color: #003f3a !important;
    color: white;
}
</style>
@endsection
