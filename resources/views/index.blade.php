@extends('layouts/blankLayout')

@section('title', 'AdHoc - Disbud')
<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
<style>
    /* Custom styles */
    .hero-video {
        position: relative;
        height: 100vh;
        overflow: hidden;
    }

    .bg-img {
        width: 100%;
        object-fit: cover;
        filter: brightness(50%);

    }

    .hero-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
    }


    .feature-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .testimonial-card {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .contact-info {
        background-color: #343a40;
        color: #fff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }
</style>

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">My Awesome Landing Page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WBB">Peta</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section with Video Background -->
<section class="hero-video">
    <img class="bg-img" src="{{asset('assets/img/bg.jpg')}}" />
    <div class="hero-content">
        <h1 class="text-primary">Welcome to our Awesome Website</h1>
        <p>Your message goes here.</p>
        <a href="#features" class="btn btn-get-started btn-primary">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-primary">Key Features</h2>
        <div class="row">
            <!-- Feature 1 -->
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <h3>Feature 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <h3>Feature 2</h3>
                    <p>Nullam efficitur turpis eget nibh vestibulum, vel bibendum odio placerat.</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <h3>Feature 3</h3>
                    <p>Curabitur vel arcu non neque iaculis feugiat eget non nisi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section with Carousel -->
<section id="testimonials" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-primary">What Our Customers Say</h2>
        <div id="testimonial-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Testimonial 1 -->
                <div class="carousel-item active">
                    <div class="testimonial-card">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
                        <p class="font-weight-bold">John Doe</p>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="carousel-item">
                    <div class="testimonial-card">
                        <p>"Nullam efficitur turpis eget nibh vestibulum, vel bibendum odio placerat."</p>
                        <p class="font-weight-bold">Jane Smith</p>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="carousel-item">
                    <div class="testimonial-card">
                        <p>"Curabitur vel arcu non neque iaculis feugiat eget non nisi."</p>
                        <p class="font-weight-bold">Tom Johnson</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 text-primary">Contact Us</h2>
        <div class="row ">
            <div class="col-md-6 mx-auto">
                <div class="contact-info bg-primary" >
                    <h3>Contact Information</h3>
                    <p>Email: info@example.com</p>
                    <p>Phone: +1 (123) 456-7890</p>
                    <p>Address: 123 Street, City, Country</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Link to Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection