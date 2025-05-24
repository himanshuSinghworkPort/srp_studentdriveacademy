<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Resource Management Portal | @yield('title', 'Home')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assests/css/style.css') }}">
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <!-- Optional: Replace with logo image -->
                    <!-- <img src="{{ asset('assets/images/logo.png') }}" alt="SDA Logo" height="40"> -->
                    SDA Portal
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}"
                                href="{{ route('welcome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'courses' ? 'active' : '' }}"
                                href="{{ route('courses') }}">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'schedule' ? 'active' : '' }}"
                                href="{{ route('schedule') }}">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'resources' ? 'active' : '' }}"
                                href="{{ route('resources') }}">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"
                                href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"
                                href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
                                            href="{{ route('profile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ Route::currentRouteName() == 'logout' ? 'active' : '' }}"
                                            href="{{ route('logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'auth' ? 'active' : '' }}"
                                    href="{{ route('auth') }}">Login/Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <main role="main" class="main-content">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h5 class="footer-title">Student Drive Academy</h5>
                        <p class="text-muted">Empowering students with quality education and resources for a brighter
                            future.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5 class="footer-title">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('about') }}" class="footer-link">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="footer-link">Contact</a></li>
                            <li><a href="{{ route('courses') }}" class="footer-link">Courses</a></li>
                            <li><a href="{{ route('resources') }}" class="footer-link">Resources</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5 class="footer-title">Connect With Us</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="footer-link">Facebook</a></li>
                            <li><a href="#" class="footer-link">Twitter</a></li>
                            <li><a href="#" class="footer-link">LinkedIn</a></li>
                            <li><a href="#" class="footer-link">Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <span>© {{ date('Y') }} Student Resource Portal developed by Student Drive Academy</span>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assests/js/script.js') }}"></script>
</body>

</html>
