@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin_common.css') }}">

    <div class="form-container">
        <a href="{{ url('/admin/dashboard') }}" class="btn-back">Atpakaļ</a>
        <h1 class="form-title">Pievienot jaunu ziņu</h1>

        @if ($errors->any())
            <div class="error-message" style="margin-bottom:15px;">
                <ul style="margin:0;padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('posts.store') }}"
              enctype="multipart/form-data"
              class="post-form">
            @csrf
            <div class="form-group">
                <label for="title">Virsraksts:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="content">Saturs:</label>
                <textarea id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="attachments">Pielikumi (jpg, png, pdf, max 2MB):</label>
                <input type="file" id="attachments" name="attachments[]" accept=".jpg,.jpeg,.png,.pdf" multiple>

                @if(!empty($post->attachments))
                    <p style="margin-top:8px;">Pašreizējie pielikumi:</p>
                    <ul>
                        @foreach($post->attachments as $file)
                            <li>
                                <a href="{{ asset('storage/'.$file) }}" target="_blank">{{ basename($file) }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <button type="submit" class="btn-submit">Saglabāt</button>
        </form>
    </div>
@endsection
