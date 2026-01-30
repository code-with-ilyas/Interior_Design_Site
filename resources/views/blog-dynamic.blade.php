@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="mb-5">
                <h1 class="display-4 mb-3">
                    @if(isset($category))
                        {{ $category->name }} Articles
                    @else
                        Articles & Blogs
                    @endif
                </h1>
                @if(isset($category))
                    <p class="lead text-muted">Browse articles in the {{ $category->name }} category</p>
                @else
                    <p class="lead text-muted">Latest news, insights, and updates from our team</p>
                @endif
            </div>

            <!-- Blog Posts -->
            @if($posts->count() > 0)
                <div class="row g-4">
                    @foreach($posts as $post)
                        <div class="col-md-6">
                            <article class="blog-post h-100">
                                @if($post->image)
                                    <div class="post-image mb-3">
                                        <img src="{{ Storage::url($post->image) }}"
                                             alt="{{ $post->title }}"
                                             class="img-fluid rounded"
                                             style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>
                                @endif

                                <div class="post-content">
                                    <div class="post-meta mb-3 d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                        </small>
                                        <small class="text-muted">
                                            {{ $post->category->name ?? 'General' }}
                                        </small>
                                    </div>

                                    <h3 class="post-title h5 mb-3">
                                        <a href="{{ route('blog.show', $post) }}"
                                           class="text-decoration-none text-dark">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    @if($post->excerpt)
                                        <p class="post-excerpt">{{ Str::limit($post->excerpt, 150) }}</p>
                                    @endif

                                    <a href="{{ route('blog.show', $post) }}"
                                       class="th-btns black-border mt-3 mb-2">
                                        Read More
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($posts->hasPages())
                    <div class="mt-5">
                        {{ $posts->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <h3 class="mb-3">No posts found</h3>
                    <p class="text-muted">There are no blog posts available in this category yet.</p>
                    <a href="{{ route('blog.index') }}" class="th-btns black-border">
                        View All Blog Posts
                    </a>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar">
                <!-- Categories -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('blog.index') }}"
                                   class="text-decoration-none {{ !isset($category) ? 'fw-bold text-primary' : 'text-dark' }}">
                                    All Posts
                                    {{-- <span class="badge bg-secondary float-end">{{ $categories->sum('posts_count') }}</span> --}}
                                </a>
                            </li>
                            @foreach($categories as $cat)
                                @if($cat->posts_count > 0)
                                    <li class="mb-2">
                                        <a href="{{ route('blog.category', $cat) }}"
                                           class="text-decoration-none {{ (isset($category) && $category->id === $cat->id) ? 'fw-bold text-primary' : 'text-dark' }}">
                                            {{ $cat->name }}
                                            {{-- <span class="badge bg-secondary float-end">{{ $cat->posts_count }}</span> --}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Recent Posts -->
                @php
                    $recentPosts = \App\Models\BlogPost::with('category')
                        ->where('published_at', '<=', now())
                        ->orWhereNull('published_at')
                        ->orderBy('published_at', 'desc')
                        ->limit(5)
                        ->get();
                @endphp

                @if($recentPosts->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Recent Posts</h5>
                        </div>
                        <div class="card-body">
                            @foreach($recentPosts as $recentPost)
                                <div class="recent-post mb-3 pb-3 border-bottom">
                                    @if($recentPost->image)
                                        <div class="recent-post-image mb-2">
                                            <img src="{{ Storage::url($recentPost->image) }}"
                                                 alt="{{ $recentPost->title }}"
                                                 class="img-fluid rounded"
                                                 style="width: 100%; height: 80px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <h6 class="recent-post-title mb-1">
                                        <a href="{{ route('blog.show', $recentPost) }}"
                                           class="text-decoration-none text-dark">
                                            {{ Str::limit($recentPost->title, 60) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        {{ $recentPost->published_at ? $recentPost->published_at->format('M d, Y') : $recentPost->created_at->format('M d, Y') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.post-title a {
    transition: color 0.3s ease;
}

.post-title a:hover {
    color: #003f3a !important;
}

.recent-post-title a {
    color: #333;
    transition: color 0.3s ease;
}

.recent-post-title a:hover {
    color: #003f3a;
}

.sidebar .card {
    border: 1px solid #eee;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.sidebar .card ul li a {
    display: block;
    padding: 8px 0;
    transition: all 0.3s ease;
}

.sidebar .card ul li a:hover {
    color: #003f3a !important;
}

.sidebar .card ul li:not(:last-child) {
    border-bottom: 1px solid #f0f0f0;
}

/* Category badge styling */
.category-badge {
    display: inline-block;
    background: linear-gradient(65deg, #003f3a 0%, #000000 100%);
    color: #ffffff;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.85rem;
    font-weight: 500;
    letter-spacing: 0.5px;
}
</style>
@endsection
