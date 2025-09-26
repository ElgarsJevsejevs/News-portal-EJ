@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/posts_show.css') }}">

    <div class="post-container">
        <a href="{{ url('/') }}" class="btn-back">Atpakaļ uz ziņām</a>

        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-meta">{{ $post->created_at->format('Y-m-d H:i') }}</p>
        <div class="post-content">{{ $post->content }}</div>

        <h3 class="comments-title">Komentāri</h3>
        @forelse($post->comments as $comment)
            <div class="comment-card">
                <strong>{{ $comment->author_name }}</strong>: {{ $comment->content }}

                @if(session('user_id'))
                    <form action="{{ route('comments.destroy', $comment->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn-delete"
                                onclick="return confirm('Vai tiešām dzēst šo komentāru?')">
                            Dzēst
                        </button>
                    </form>
                @endif
            </div>
        @empty
            <p class="no-comments">Šobrīd komentāru nav.</p>
        @endforelse

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif

        @if($post->attachments && count($post->attachments) > 0)
            <div class="post-attachments">
                <h3>Pielikumi</h3>
                <ul class="attachments-list">
                    @foreach($post->attachments as $file)
                        <li class="attachment-item">
                            <a href="{{ asset('storage/'.$file) }}"
                               target="_blank"
                               class="attachment-link">
                                {{ basename($file) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button class="btn-submit" id="openCommentModal">Pievienot komentāru</button>
    </div>

    <div id="commentModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" id="closeCommentModal">&times;</span>
            <h2>Pievienot komentāru</h2>

            <form method="POST" action="{{ url('/posts/'.$post->id.'/comments') }}" class="comment-form">
                @csrf
                <div class="form-group">
                    <label>Vārds:</label>
                    <input type="text" name="author_name" required>
                </div>
                <div class="form-group">
                    <label>Komentārs:</label>
                    <textarea name="content" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label>{{ $a }} + {{ $b }} = ?</label>
                    <input type="text" name="captcha" required>
                </div>
                <button type="submit" class="btn-submit">Saglabāt</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/main_page.js') }}"></script>
@endsection
