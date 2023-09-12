@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 text-dark">Welcome to Shotr</h1>
                <p class="lead text-muted">Shorten your links and simplify sharing.</p>
                <a href="{{ route('login') }}" class="btn btn-success btn-lg">Get Started</a>
            </div>
        </div>
    </div>
</section>


<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-link fa-3x text-success"></i>
                    <h3>Shorten Links</h3>
                    <p>Quickly create short, memorable URLs for sharing.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-chart-bar fa-3x text-success"></i>
                    <h3>Track Views</h3>
                    <p>Gain insights into link performance with views counter.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-lock fa-3x text-success"></i>
                    <h3>Secure Links</h3>
                    <p>Protect your links with advanced security features.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta bg-success">
    <div class="container text-center">
        <h2 class="display-5 text-white">Ready to simplify your links?</h2>
        <a href="{{ route('login') }}" class="btn btn-light btn-lg text-success">Get Started</a>
    </div>
</section>
@endsection
