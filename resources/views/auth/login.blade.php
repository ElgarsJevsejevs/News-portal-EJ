@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <div class="login-container">
        <div class="login-container-wrapper">
            <h1 class="login-title">Admin Login</h1>

            @if(session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required class="form-input">
                </div>
                <div class="form-group">
                    <label>Parole:</label>
                    <input type="password" name="password" required class="form-input">
                </div>
                <button type="submit" class="btn-submit">Pieslēgties</button>
            </form>
        </div>
    </div>
@endsection
