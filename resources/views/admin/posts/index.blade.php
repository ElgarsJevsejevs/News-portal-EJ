@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin_common.css') }}">

    <div class="form-container">
        <a href="{{ url('/admin/dashboard') }}" class="btn-back">Atpakaļ</a>
        <h1 class="form-title">Ziņu saraksts</h1>

        <div class="actions-top">
            <a href="{{ route('posts.create') }}" class="btn-submit">+ Pievienot jaunu ziņu</a>
        </div>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="posts-table">
            <thead>
            <tr>
                <th>Virsraksts</th>
                <th>Darbības</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td class="actions">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn-action-small">Rediģēt</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-small" onclick="return confirm('Vai tiešām dzēst?')">
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
