<header>
    <nav class="navbar">
        <div class="logo">
            <a href="#">
                <img src="{{ url("assets/images/logo-white.png") }}" alt="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('auth.login') }}" class="auth-button">Login</a>
            <a href="{{ route('auth.register') }}" class="auth-button">Register</a>
        </div>
    </nav>
</header>