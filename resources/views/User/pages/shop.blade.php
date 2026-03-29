<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - All Books</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @include('User.layouts.head')
    @include('User.layouts.header')
    
    <section id="Shop" class="position-relative padding-large">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="section-title">
                    <h3>All Books</h3>
                </div>
                
                <!-- Category Filter Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-filter me-2"></i>
                        {{ request('category') ? ucfirst(request('category')) : 'جميع الفئات' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li>
                            <a class="dropdown-item {{ !request('category') ? 'active' : '' }}" href="{{ route('shop') }}">
                                جميع الفئات
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        @foreach($categories as $category)
                        <li>
                            <a class="dropdown-item {{ request('category') == $category->name ? 'active' : '' }}" 
                               href="{{ route('shop', ['category' => $category->name]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($books as $book)
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                    <div class="card position-relative p-3 border rounded-3" style="min-height: 350px;">
                        
                        @if(isset($book->discount) && $book->discount > 0)
                        <div class="position-absolute" style="top: 10px; left: 10px; z-index: 1;">
                            <p class="bg-primary py-1 px-2 fs-6 text-white rounded-2">{{ $book->discount }}% off</p>
                        </div>
                        @endif
                        
                        <img src="{{ asset('images/books/' . $book->image) }}" 
                             class="img-fluid shadow-sm" 
                             alt="{{ $book->title }}"
                             style="height: 180px; object-fit: contain;">
                        
                        <h6 class="mt-3 mb-1 fw-bold">
                            <a href="{{ route('product.single', $book->id) }}" class="text-decoration-none text-dark">
                                {{ $book->title }}
                            </a>
                        </h6>
                        
                        <div class="review-content d-flex justify-content-between align-items-center">
                            <p class="my-2 fs-6 text-black-50">{{ $book->author }}</p>

                            <div class="rating text-warning d-flex align-items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                        </div>

                        <span class="price text-primary fw-bold mb-2 fs-5 d-block">
                            JOD {{ number_format($book->price, 2) }}
                        </span>
                        
                        <div class="card-concern position-absolute d-flex gap-2" style="bottom: 15px; left: 50%; transform: translateX(-50%);">
                            <form action="{{ route('cart.add', ['bookId' => $book->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-dark">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </form>

                            <button type="button" class="btn btn-dark" title="Add to Wishlist">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-dark fs-5">Not Found</p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($books->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $books->links() }}
            </div>
            @endif
        </div>
    </section>

    @include('User.layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('user/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>
