@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/news_posts.css') }}">

    <div class="posts-container">
        <h1 class="page-title">Ziņu saraksts</h1>

        <div class="posts-container-wrapper">
        @foreach($posts as $post)
            <div class="post-card" data-href="{{ url('/posts/'.$post->id) }}">
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-meta">{{ $post->created_at->format('Y-m-d') }}</p>
                <p class="post-excerpt">{{ Str::limit($post->content, 150) }}</p>
                <p class="post-comments">{{ $post->comments_count }} komentāri</p>
            </div>
        @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection

<script src="{{ asset('js/main_page.js') }}"></script>
