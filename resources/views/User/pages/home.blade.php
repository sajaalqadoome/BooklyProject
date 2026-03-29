@extends('User.layouts.master')

@section('content')

<section id="billboard" class="position-relative d-flex align-items-center py-5 bg-light-gray"
    style="background-image: url('{{ asset('User/bookly-bookstore-free-website-template/images/banner-image-bg.jpg') }}')
    ">
    <div class="position-absolute end-0 pe-0 pe-xxl-5 me-0 me-xxl-5 swiper-next main-slider-button-next">
        <svg class="chevron-forward-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
            <use xlink:href="#alt-arrow-right-outline"></use>
        </svg>
    </div>
    <div class="position-absolute start-0 ps-0 ps-xxl-5 ms-0 ms-xxl-5 swiper-prev main-slider-button-prev">
        <svg class="chevron-back-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
            <use xlink:href="#alt-arrow-left-outline"></use>
        </svg>
    </div>
    <div class="swiper main-swiper">
        <div class="swiper-wrapper d-flex align-items-center">
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
                            <div class="banner-content">
                                <h2>The Fine Print Book Collection</h2>
                                <p>Best Offer Save 30%. Grab it now!</p>
                                <a href="{{ route('shop') }}" class="btn mt-3">Shop Collection</a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="image-holder">
                                <img src="{{ asset('User/bookly-bookstore-free-website-template/images/banner-image2.png') }}" class="img-fluid" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
                            <div class="banner-content">
                                <h2>How Innovation works</h2>
                                <p>Discount available. Grab it now!</p>
                                <a href="{{ route('shop') }}" class="btn mt-3">Shop Product</a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="image-holder">
                                <img src="{{ asset('user/bookly-bookstore-free-website-template/images/banner-image1.png') }}" class="img-fluid" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
                            <div class="banner-content">
                                <h2>Your Heart is the Sea</h2>
                                <p>Limited stocks available. Grab it now!</p>
                                <a href="{{ route('shop') }}" class="btn mt-3">Shop Collection</a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="image-holder">
                                <img src="{{ asset('User/bookly-bookstore-free-website-template/images/banner-image.png') }}" class="img-fluid" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!---->
<section id="services" class="padding-large pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
                <div class="icon-box d-flex">
                    <div class="icon-box-icon pe-3 pb-3">
                        <svg class="cart-outline"><use xlink:href="#cart-outline"/></svg>
                    </div>
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1 text-capitalize text-dark">Free delivery</h4>
                        <p>Consectetur adipi elit lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
                <div class="icon-box d-flex">
                    <div class="icon-box-icon pe-3 pb-3">
                        <svg class="quality"><use xlink:href="#quality"/></svg>
                    </div>
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1 text-capitalize text-dark">Quality guarantee</h4>
                        <p>Dolor sit amet orem ipsu mcons ectetur adipi elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
                <div class="icon-box d-flex">
                    <div class="icon-box-icon pe-3 pb-3">
                        <svg class="price-tag"><use xlink:href="#price-tag"/></svg>
                    </div>
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1 text-capitalize text-dark">Daily offers</h4>
                        <p>Amet consectetur adipi elit loreme ipsum dolor sit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
                <div class="icon-box d-flex">
                    <div class="icon-box-icon pe-3 pb-3">
                        <svg class="shield-plus"><use xlink:href="#shield-plus"/></svg>
                    </div>
                    <div class="icon-box-content">
                        <h4 class="card-title mb-1 text-capitalize text-dark">100% secure payment</h4>
                        <p>Rem Lopsum dolor sit amet, consectetur adipi elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!---->



<!--view data in DB-->
<!-- Books Section with Search -->
<section id="Book" class="position-relative padding-large">
    <div class="container">
        <div class="section-title d-md-flex justify-content-between align-items-center mb-4">
            <h3 class="d-flex align-items-center">Best selling items</h3>
            
            <div class="d-flex gap-3 align-items-center">
                <form action="{{ route('home') }}" method="GET" class="d-flex">
                    <div class="input-group" style="width: 250px;">
                        <input type="text"
                               name="query"
                               class="form-control"
                               placeholder="ابحث..."
                               value="{{ request('query') }}">
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('shop') }}" class="btn btn-primary">View All</a>
            </div>
        </div>
        
  
        
        <div class="position-absolute top-50 end-0 pe-0 pe-xxl-5 me-0 me-xxl-5 swiper-next product-slider-button-next">
            <svg class="chevron-forward-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
                <use xlink:href="#alt-arrow-right-outline"></use>
            </svg>
        </div>
        <div class="position-absolute top-50 start-0 ps-0 ps-xxl-5 ms-0 ms-xxl-5 swiper-prev product-slider-button-prev">
            <svg class="chevron-back-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
                <use xlink:href="#alt-arrow-left-outline"></use>
            </svg>
        </div>
        
        <div class="swiper product-swiper">
            <div class="swiper-wrapper">
                @forelse($books as $book)
                <div class="swiper-slide">
                    <div class="card position-relative p-4 border rounded-3">
                        @if(isset($book->discount) && $book->discount > 0)
                        <div class="position-absolute">
                            <p class="bg-primary py-1 px-3 fs-6 text-white rounded-2">{{ $book->discount }}% off</p>
                        </div>
                        @endif
                        <img src="{{ asset('images/books/' . $book->image) }}"
                             class="img-fluid shadow-sm"
                             alt="{{ $book->title }}"
                             style="height: 300px; object-fit: contain;">
                        <h6 class="mt-4 mb-0 fw-bold">
                            <a href="{{ route('product.single', $book->id) }}">{{ $book->title }}</a>
                        </h6>
                        <div class="review-content d-flex">
                            <p class="my-2 me-2 fs-6 text-black-50">{{ $book->author }}</p>
                            <div class="rating text-warning d-flex align-items-center">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="star star-fill">
                                    <use xlink:href="#star-fill"></use>
                                </svg>
                                @endfor
                            </div>
                        </div>
                        <span class="price text-primary fw-bold mb-2 fs-5">
                            JOD {{ number_format($book->price, 2) }}
                        </span>
                        
                  
                        <div class="card-concern position-absolute start-0 end-0 d-flex gap-2">
                            <form action="{{ route('cart.add',$book->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Cart">
                                    <svg class="cart">
                                        <use xlink:href="#cart"></use>
                                    </svg>
                                </button>
                            </form>

   
                            

                            @auth
<form action="{{ route('wishlist.add', $book->id) }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist">
        <svg class="wishlist">
            <use xlink:href="#heart"></use>
        </svg>
    </button>
</form>
@else
<a href="{{ route('login') }}" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Login to add to wishlist">
    <svg class="wishlist">
        <use xlink:href="#heart"></use>
    </svg>
</a>
@endauth


                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="text-dark">No books available at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!--view data in DB-->

    <section id="limited-offer" class="padding-large"
      style="background-image: url(User/bookly-bookstore-free-website-template/images/banner-image-bg-1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center; height: 800px;">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-md-6 text-center">
            <div class="image-holder">
              <img src="User/bookly-bookstore-free-website-template/images/banner-image3.png" class="img-fluid" alt="banner">
            </div>
          </div>
          <div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
            <h2>30% Discount on all items. Hurry Up !!!</h2>
            <div id="countdown-clock" class="text-dark d-flex align-items-center my-3">
              <div class="time d-grid pe-3">
                <span class="days fs-1 fw-normal"></span>
                <small>Days</small>
              </div>
              <span class="fs-1 text-primary">:</span>
              <div class="time d-grid pe-3 ps-3">
                <span class="hours fs-1 fw-normal"></span>
                <small>Hrs</small>
              </div>
              <span class="fs-1 text-primary">:</span>
              <div class="time d-grid pe-3 ps-3">
                <span class="minutes fs-1 fw-normal"></span>
                <small>Min</small>
              </div>
              <span class="fs-1 text-primary">:</span>
              <div class="time d-grid ps-3">
                <span class="seconds fs-1 fw-normal"></span>
                <small>Sec</small>
              </div>
            </div>
            <a href="shop.html" class="btn mt-3">Shop Collection</a>
          </div>
        </div>
      </div>
      </div>
    </section>

    <section id="items-listing" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="featured border rounded-3 p-4">
              <div class="section-title overflow-hidden mb-5 mt-2">
                <h3 class="d-flex flex-column mb-0">Featured</h3>
              </div>
              <div class="items-lists">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item2.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Echoes of the Ancients</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>

                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
                <hr class="gray-400">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item1.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">The Midnight Garden</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
                <hr>
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item3.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Shadow of the Serpent</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>

                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="latest-items border rounded-3 p-4">
              <div class="section-title overflow-hidden mb-5 mt-2">
                <h3 class="d-flex flex-column mb-0">Latest items</h3>
              </div>
              <div class="items-lists">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item4.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Whispering Winds</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
                <hr class="gray-400">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item5.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">The Forgotten Realm</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
                <hr>
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item6.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Moonlit Secrets</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="best-reviewed border rounded-3 p-4">
              <div class="section-title overflow-hidden mb-5 mt-2">
                <h3 class="d-flex flex-column mb-0">Best reviewed</h3>
              </div>
              <div class="items-lists">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item7.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">The Crystal Key</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
                <hr class="gray-400">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item8.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Starlight Sonata</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
                <hr>
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item9.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Tales of the Enchanted Forest</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5">$870</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="on-sale border rounded-3 p-4">
              <div class="section-title overflow-hidden mb-5 mt-2">
                <h3 class="d-flex flex-column mb-0">On sale</h3>
              </div>
              <div class="items-lists">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item10.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">The Phoenix Chronicles</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5"><s class="text-black-50">$1666</s>
                      $999</span>
                  </div>
                </div>
                <hr class="gray-400">
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item11.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Dreams of Avalon</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5"><s class="text-black-50">$500</s>
                      $410</span>
                  </div>
                </div>
                <hr>
                <div class="item d-flex">
                  <img src="User/bookly-bookstore-free-website-template/images/product-item12.png" class="img-fluid shadow-sm" alt="product item">
                  <div class="item-content ms-3">
                    <h6 class="mb-0 fw-bold"><a href="single-product.html">Legends of the Dragon Isles</a></h6>
                    <div class="review-content d-flex">
                      <p class="my-2 me-2 fs-6 text-black-50">Lauren Asher</p>
                      <div class="rating text-warning d-flex align-items-center">
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                        <svg class="star star-fill">
                          <use xlink:href="#star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <span class="price text-primary fw-bold mb-2 fs-5"><s class="text-black-50">$600</s>
                      $500</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<section id="Categories" class="padding-large pt-0">
    <div class="container">
        <div class="section-title overflow-hidden mb-4">
            <h3 class="d-flex align-items-center">Categories</h3>
        </div>
        <div class="row">
            <!-- Novels -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">

                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/photo-14.avif') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt="Novels">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                            Novels
                        </h6>
                    </a>
                </div>
            </div>

            <!-- Cultural -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">
                    <a href="shop.html" class="d-block h-100">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/Cultural.jpg') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt="Cultural">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                            Cultural
                        </h6>
                    </a>
                </div>
            </div>

            <!-- Historical -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">
                    <a href="shop.html" class="d-block h-100">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/Historical.webp') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt="Historical">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                            Historical
                        </h6>
                    </a>
                </div>
            </div>

            <!--  Cooking  -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">
                    <a href="shop.html" class="d-block h-100">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/Cooking.webp') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt=" Cooking">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                             Cooking 
                        </h6>
                    </a>
                </div>
            </div>

            <!-- Children -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">
                    <a href="shop.html" class="d-block h-100">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/Children.avif') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt="Children">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                            Children
                        </h6>
                    </a>
                </div>
            </div>

            <!-- Religious -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">
                    <a href="shop.html" class="d-block h-100">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/Religious.png') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt="Religious">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                            Religious
                        </h6>
                    </a>
                </div>
            </div>

            <!-- Technology -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">
                    <a href="shop.html" class="d-block h-100">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/technology.jfif') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt="Technology">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                            Technology
                        </h6>
                    </a>
                </div>
            </div>

            <!-- Academic -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 rounded-3 position-relative" style="overflow: hidden; height: 300px;">
                    <a href="shop.html" class="d-block h-100">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/Academic.jfif') }}" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;" 
                             alt="Academic">
                        <h6 class="position-absolute bottom-0 start-0 bg-primary m-3 py-2 px-3 rounded-3 text-white mb-3 ms-3">
                            Academic
                        </h6>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

    <section id="reviews" class="position-relative padding-large"
      style="background-image: url(User/bookly-bookstore-free-website-template/images/banner-image-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center; height: 600px;">
      <div class="container offset-md-3 col-md-6 ">
        <div class="position-absolute top-50 end-0 pe-0 pe-xxl-5 me-0 me-xxl-5 swiper-next testimonial-button-next">
          <svg class="chevron-forward-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
            <use xlink:href="#alt-arrow-right-outline"></use>
          </svg>
        </div>
        <div class="position-absolute top-50 start-0 ps-0 ps-xxl-5 ms-0 ms-xxl-5 swiper-prev testimonial-button-prev">
          <svg class="chevron-back-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
            <use xlink:href="#alt-arrow-left-outline"></use>
          </svg>
        </div>
        <div class="section-title mb-4 text-center">
          <h3 class="mb-4">Customers reviews</h3>
        </div>
        <div class="swiper testimonial-swiper ">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card position-relative text-left p-5 border rounded-3">
                <blockquote>"I stumbled upon this bookstore while visiting the city, and it instantly became my favorite spot. The cozy atmosphere, friendly staff, and wide selection of books make every visit a delight!"</blockquote>
                <div class="rating text-warning d-flex align-items-center">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <h5 class="mt-1 fw-normal">Emma Chamberlin</h5>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card position-relative text-left p-5 border rounded-3">
                <blockquote>"As an avid reader, I'm always on the lookout for new releases, and this bookstore never disappoints. They always have the latest titles, and their recommendations have introduced me to some incredible reads!"</blockquote>
                <div class="rating text-warning d-flex align-items-center">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <h5 class="mt-1 fw-normal">Thomas John</h5>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card position-relative text-left p-5 border rounded-3">
                <blockquote>"I ordered a few books online from this store, and I was impressed by the quick delivery and careful packaging. It's clear that they prioritize customer satisfaction, and I'll definitely be shopping here again!"</blockquote>
                <div class="rating text-warning d-flex align-items-center">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <h5 class="mt-1 fw-normal">Kevin Bryan</h5>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card position-relative text-left p-5 border rounded-3">
                <blockquote>“I stumbled upon this tech store while searching for a new laptop, and I couldn't be happier
                  with my experience! The staff was incredibly knowledgeable and guided me through the process of choosing
                  the perfect device for my needs. Highly recommended!”</blockquote>
                <div class="rating text-warning d-flex align-items-center">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <h5 class="mt-1 fw-normal">Stevin</h5>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card position-relative text-left p-5 border rounded-3">
                <blockquote>“I stumbled upon this tech store while searching for a new laptop, and I couldn't be happier
                  with my experience! The staff was incredibly knowledgeable and guided me through the process of choosing
                  the perfect device for my needs. Highly recommended!”</blockquote>
                <div class="rating text-warning d-flex align-items-center">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <h5 class="mt-1 fw-normal">Roman</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="latest-posts" class="padding-large">
      <div class="container">
        <div class="section-title d-md-flex justify-content-between align-items-center mb-4">
          <h3 class="d-flex align-items-center">Latest posts</h3>
          <a href="shop.html" class="btn">View All</a>
        </div>
        <div class="row">
          <div class="col-md-3 posts mb-4">
            <img src="User/bookly-bookstore-free-website-template/images/post-item1.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="single-post.html">10 Must-Read Books of the Year: Our Top Picks!</a></h4>
            <p class="mb-2">Dive into the world of cutting-edge technology with our latest blog post, where we highlight
              five essential gadge. <span><a class="text-decoration-underline text-black-50" href="single-post.html">Read More</a></span>
            </p>
          </div>
          <div class="col-md-3 posts mb-4">
            <img src="User/bookly-bookstore-free-website-template/images/post-item2.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="single-post.html">The Fascinating Realm of Science Fiction</a></h4>
            <p class="mb-2">Explore the intersection of technology and sustainability in our latest blog post. Learn about
              the innovative <span><a class="text-decoration-underline text-black-50" href="single-post.html">Read More</a></span> </p>
          </div>
          <div class="col-md-3 posts mb-4">
            <img src="User/bookly-bookstore-free-website-template/images/post-item3.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="single-post.html">Finding Love in the Pages of a Book</a></h4>
            <p class="mb-2">Stay ahead of the curve with our insightful look into the rapidly evolving landscape of
              wearable technology. <span><a class="text-decoration-underline text-black-50" href="single-post.html">Read More</a></span>
            </p>
          </div>
          <div class="col-md-3 posts mb-4">
            <img src="User/bookly-bookstore-free-website-template/images/post-item4.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="single-post.html">Reading for Mental Health: How Books Can Heal and Inspire</a></h4>
            <p class="mb-2">In today's remote work environment, productivity is key. Discover the top apps and tools that
              can help you stay <span><a class="text-decoration-underline text-black-50" href="single-post.html">Read More</a></span>
            </p>
          </div>
        </div>
      </div>
    </section>


<!--inst-->
    <section id="Contact">
      <div class="container">
        <div class="text-center mb-4">
          <h3>Instagram</h3>
        </div>
        <div class="row">
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="User/bookly-bookstore-free-website-template/images/insta-item1.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="User/bookly-bookstore-free-website-template/images/insta-item2.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="User/bookly-bookstore-free-website-template/images/insta-item3.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="User/bookly-bookstore-free-website-template/images/insta-item4.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="User/bookly-bookstore-free-website-template/images/insta-item5.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="User/bookly-bookstore-free-website-template/images/insta-item6.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
        </div>
      </div>
    </section>
<!--inst-->


@endsection
