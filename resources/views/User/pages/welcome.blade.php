@extends('User.layouts.master')

@section('title', 'Welcome to Bookly')

@section('content')

<section style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container text-center text-white">
        <h1 style="font-size: 4rem; font-weight: bold; margin-bottom: 1rem;">📚 Welcome to Bookly</h1>
        <p style="font-size: 1.5rem; margin-bottom: 2rem;">Your favorite online bookstore</p>
        <a href="#" class="btn btn-light btn-lg px-5 py-3" style="font-size: 1.2rem;">Explore Books</a>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="p-4">
                    <h3>📦 Free Delivery</h3>
                    <p>On orders over $50</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4">
                    <h3>✅ Quality</h3>
                    <p>Best books guaranteed</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4">
                    <h3>💰 Best Prices</h3>
                    <p>Daily special offers</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4">
                    <h3>🔒 Secure</h3>
                    <p>100% safe payment</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection