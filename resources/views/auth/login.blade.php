@extends('layouts.app')

@section('title', 'Admin Login - Explore Ondo')

@section('content')
<div class="container">
    <div class="form-box">
        <h1>Super Admin Login</h1>

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">Log In</button>
            </div>
        </form>
    </div>
</div>
@endsection