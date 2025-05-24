@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="about-overview">
        <!-- Hero Section -->
        <div class="hero-section text-center text-white py-5 mb-5" style="background: linear-gradient(135deg, #2563eb, #1e40af); border-radius: 12px;">
            <div class="container">
                <h1 class="display-4 fw-bold">About Student Drive Academy</h1>
                <p class="lead">Empowering students with cutting-edge technical education for a brighter future.</p>
                <a href="{{ route('courses') }}" class="btn btn-light btn-lg mt-3">Explore Our Courses</a>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="container mb-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="mb-3">Our Mission</h2>
                    <p>Student Drive Academy is dedicated to providing high-quality education and training in various technical fields. Our mission is to empower students with the skills, knowledge, and confidence needed to succeed in the modern, technology-driven world. We strive to create an inclusive learning environment that fosters innovation and prepares students for rewarding careers.</p>
                </div>
                <div class="col-md-6 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#2563eb" class="bi bi-rocket-takeoff" viewBox="0 0 16 16">
                        <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362.798-.799.96-1.932.362-2.531-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532Z"/>
                        <path d="M15.811 3.312c-.363 1.534-1.334 3.082-2.637 4.385-2.828 2.829-7.384 4.003-10.907 2.34-1.63-.764-1.97-2.831-.936-4.182 1.046-1.366 3.042-1.576 4.4-.587 1.372 1.008 3.184 1.086 4.74.085 1.567-1.01 2.664-2.764 2.915-4.539.016-.111.074-.218.175-.3.652-.534 1.654-.277 2.183.374.082.1.19.158.3.175Z"/>
                        <path d="M16 12.5c0 .828-.896 1.5-2 1.5s-2-.672-2-1.5c0-.729.563-1.337 1.29-1.467l-.626-2.506a4.758 4.758 0 0 0-.37-.587c-.564-.42-1.264-.654-2-.654-.828 0-1.5-.672-1.5-1.5 0-.065.008-.13.013-.193-.693-.135-1.38-.35-1.33-.647-1.35-.614-2.535-1.394-3.384-2.243-.849-.848-1.63-2.034-2.243-3.384C.35 1.38.135.693 0 .999.13.008.672 0 1.5 0c.828 0 1.5.672 1.5 1.5 0 .736-.534 1.436-.954 2-.42.564-.654 1.264-.654 2 0 .828.672 1.5 1.5 1.5.736 0 1.436-.534 2-.954.287.653.502 1.34.637 2.033.065-.005.13-.013.193-.013.828 0 1.5.672 1.5 1.5 0 1.106.672 2 1.5 2 .736 0 1.436-.534 2-.954.287.653.502 1.34.637 2.033.065-.005.13-.013.193-.013.828 0 1.5.672 1.5 1.5Z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="container mb-5">
            <h2 class="text-center mb-4">Meet Our Team</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach([
                    ['name' => 'Vineet Singh', 'role' => 'Academic Director', 'image' => 'assets/images/team/jane-smith.jpg'],
                    ['name' => 'Himanshu Singh', 'role' => 'Lead Instructor', 'image' => 'assets/images/team/michael-lee.jpg'],
                    ['name' => 'Mrinal Pandey', 'role' => 'Curriculum Developer', 'image' => 'assets/images/team/sarah-johnson.jpg'],
                ] as $member)
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="{{ asset($member['image']) }}" class="card-img-top rounded-circle mx-auto mt-3" alt="{{ $member['name'] }}" style="width: 120px; height: 120px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $member['name'] }}</h5>
                                <p class="card-text text-muted">{{ $member['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="container mb-5">
            <h2 class="text-center mb-4">What Our Students Say</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach([
                        ['name' => 'Vineet Singh', 'role' => 'Web Development Student', 'content' => 'Student Drive Academy transformed my career. The Web Designing course was hands-on, and the instructors were incredibly supportive.', 'image' => 'assets/images/testimonials/amit-sharma.jpg'],
                        ['name' => 'Himanshu Singh', 'role' => 'Cybersecurity Student', 'content' => 'The Cybersecurity training at SDA was top-notch. I gained practical skills that helped me secure an internship.', 'image' => 'assets/images/testimonials/priya-patel.jpg'],
                        ['name' => 'Mrinal Pandey', 'role' => 'Java J2SE Student', 'content' => 'Thanks to SDA, I mastered Java programming. The resources and schedules made learning seamless and effective.', 'image' => 'assets/images/testimonials/rahul-verma.jpg'],
                    ] as $index => $testimonial)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="card mx-auto" style="max-width: 600px;">
                                <div class="card-body text-center">
                                    <img src="{{ asset($testimonial['image'] ?: 'assets/images/testimonials/default-avatar.jpg') }}" class="rounded-circle mb-3" alt="{{ $testimonial['name'] }}" style="width: 80px; height: 80px; object-fit: cover;">
                                    <p class="card-text">"{{ $testimonial['content'] }}"</p>
                                    <h5 class="card-title">{{ $testimonial['name'] }}</h5>
                                    <p class="card-text text-muted">{{ $testimonial['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="container text-center mb-5">
            <h2 class="mb-3">Ready to Start Your Journey?</h2>
            <p>Join Student Drive Academy today and gain the skills to succeed in the tech world.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('courses') }}" class="btn btn-primary btn-lg">Browse Courses</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
@endsection
