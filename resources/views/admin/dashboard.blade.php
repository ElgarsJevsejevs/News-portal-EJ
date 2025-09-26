@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">

    <div class="admin-dashboard">
        <h1 class="dashboard-title">Admin panelis</h1>
        <p class="dashboard-welcome">
            Laipni lūgts, {{ \App\Models\User::find(session('user_id'))->name ?? 'Admin' }}!
        </p>

        <div class="dashboard-actions">
            <a href="{{ url('/admin/posts/create') }}" class="btn-action">+ Pievienot jaunu ziņu</a>
            <a href="{{ url('/admin/posts') }}" class="btn-action">Rediģēt / dzēst ziņas</a>
            <a href="{{ url('/admin/comments') }}" class="btn-action">Kommentāri</a>
            <a href="{{ url('/logout') }}" class="btn-action btn-logout">Izrakstīties</a>
        </div>
    </div>
@endsection
