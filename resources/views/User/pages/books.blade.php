6@extends('User.layouts.master')

@section('title', 'Welcome - Bookly Bookstore')

@section('content')

<!-- Hero Banner -->
<section id="billboard" class="position-relative d-flex align-items-center py-5 bg-light-gray">
    style="background-image: url({{ asset('User/bookly-bookstore-free-website-template/images/banner-image-bg.jpg') }}); 
           background-size:cover;height:800px;">
    <div class="container">
        <div class="row d-flex flex-column-reverse flex-md-row align-items-center">
            <div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
                <div class="banner-content">
                    <h2>Welcome to Bookly</h2>
                    <p>Discover Your Next Favorite Book!</p>
                    <a href="#" class="btn mt-3">Shop Now</a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="image-holder">
                    <img src="{{ asset('User/bookly-bookstore-free-template/images/banner-image2.png') }}" 
                         class="img-fluid" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Services -->
<section id="company-services" class="padding-large pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 pb-3">
                <div class="icon-box d-flex">
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1">Free Delivery</h4>
                        <p>On orders over $50</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-3">
                <div class="icon-box d-flex">
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1">Quality Guarantee</h4>
                        <p>High quality books</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-3">
                <div class="icon-box d-flex">
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1">Daily Offers</h4>
                        <p>Special discounts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-3">
                <div class="icon-box d-flex">
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1">Secure Payment</h4>
                        <p>100% protected</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Best Selling Items -->
<section id="best-selling" class="padding-large">
    <div class="container">
        <div class="section-title mb-4">
            <h3>Best Selling Books</h3>
        </div>
        <div class="row">
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card p-4 border rounded-3">
                    <img src="{{ asset('User/bookly-bookstore-free-template/images/product-item'.$i.'.png') }}" 
                         class="img-fluid" alt="book">
                    <h6 class="mt-3 fw-bold">Book Title {{ $i }}</h6>
                    <p class="text-muted">Author Name</p>
                    <span class="price text-primary fw-bold">$25.99</span>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    console.log('Welcome page loaded!');
</script>
@endpush