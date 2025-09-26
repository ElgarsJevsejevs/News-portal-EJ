@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin_common.css') }}">

    <div class="form-container">
        <a href="{{ url('/admin/dashboard') }}" class="btn-back">Atpakaļ</a>
        <h1 class="form-title">Komentāru moderācija</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="posts-table">
            <thead>
            <tr>
                <th>Autors</th>
                <th>Saturs</th>
                <th>Ziņa</th>
                <th>Darbības</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->author_name }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td class="actions">
                        <form method="POST" action="{{ route('comments.destroy',$comment->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-small" onclick="return confirm('Vai tiešām dzēst šo komentāru?')">
                                Dzēst
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
