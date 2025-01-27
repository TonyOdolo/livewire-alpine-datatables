<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Insurance Claims System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    @livewireStyles

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .hero-section {
            background: linear-gradient(135deg, #f8faff 0%, #e6f0ff 100%);
            padding: 100px 0;
        }
        .feature-card {
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background-color: #e6f0ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .feature-icon i {
            font-size: 24px;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Motor Claims</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Streamlined Motor Insurance Claims Processing</h1>
                    <p class="lead mb-4">Experience faster, more efficient claims processing with our digital platform designed for Kenya's insurance sector.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started</a>
                        <a href="#features" class="btn btn-outline-primary btn-lg">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/hero-image.jpg') }}" alt="Insurance Claims" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Key Features</h2>
            <div class="row">
                <!-- Policy Registration -->
                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3 class="h4 mb-3">Policy Registration</h3>
                            <p class="text-muted">Easy vehicle registration, automatic policy number generation, and instant premium calculations.</p>
                        </div>
                    </div>
                </div>

                <!-- Digital Claims -->
                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h3 class="h4 mb-3">Digital Claims</h3>
                            <p class="text-muted">Submit claims online with document uploads and save your progress as you go.</p>
                        </div>
                    </div>
                </div>

                <!-- Real-time Tracking -->
                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-bell"></i>
                            </div>
                            <h3 class="h4 mb-3">Real-time Tracking</h3>
                            <p class="text-muted">Monitor claim progress and receive automated notifications throughout the process.</p>
                        </div>
                    </div>
                </div>

                <!-- Analytics Dashboard -->
                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <h3 class="h4 mb-3">Analytics Dashboard</h3>
                            <p class="text-muted">Access real-time metrics and performance insights for better decision-making.</p>
                        </div>
                    </div>
                </div>

                <!-- Repair Coordination -->
                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-wrench"></i>
                            </div>
                            <h3 class="h4 mb-3">Repair Coordination</h3>
                            <p class="text-muted">Seamless communication with approved garages and repair progress tracking.</p>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h3 class="h4 mb-3">Secure Access</h3>
                            <p class="text-muted">Role-based access control ensuring data security for all users.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Transform Your Claims Process?</h2>
            <p class="lead mb-4">Join the digital transformation in motor insurance claims processing</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Start Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Motor Insurance Claims System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>
