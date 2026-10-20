<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Explore Ondo')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="brand">Explore Ondo</a>

        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('streets.index') }}">All Streets</a>
            @auth
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Admin Login</a>
            @endauth
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <div class="footer-inner">
        <div>
            <h3>Explore Ondo</h3>
            <p>Discover the Sunshine State's rich culture, vibrant streets, and unforgettable experiences.</p>
        </div>
        <div>
            <h4>Quick Links</h4>
            <a href="{{ route('home') }}">Home</a>
            <a href="#">Attractions</a>
            <a href="#">Contact</a>
        </div>
        <div>
            <h4>Contact</h4>
            <p>Ondo State, Nigeria</p>
            <p>tourism@exploreondo.com</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; {{ date('Y') }} Explore Ondo. All rights reserved.
    </div>
</footer>

<script src="{{ asset('js/slider.js') }}"></script>
</body>
</html>
