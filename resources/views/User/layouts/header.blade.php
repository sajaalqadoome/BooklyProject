<div id="preloader" class="preloader-container" style="display: none;">
    <div class="book">
        <div class="inner">
            <div class="left"></div>
            <div class="middle"></div>
            <div class="right"></div>
        </div>
        <ul>
            <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
        </ul>
    </div>
</div>


<header id="header" class="site-header">
    <div class="top-info border-bottom d-none d-md-block ">
        <div class="container-fluid">
            <div class="row g-0"></div>
        </div>
    </div>
<nav id="header-nav" class="navbar navbar-expand-lg py-3 fixed-top bg-white shadow-sm">  
          <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('User/bookly-bookstore-free-website-template/images/main-logo.png') }}" class="logo">
            </a>
            <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="navbar-icon"><use xlink:href="#navbar-icon"></use></svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
                <div class="offcanvas-header px-4 pb-0">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/main-logo.png') }}" class="logo">
                    </a>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul id="navbar" class="navbar-nav text-uppercase justify-content-start justify-content-lg-center align-items-start align-items-lg-center flex-grow-1">
                        <li class="nav-item"><a class="nav-link me-4 active" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link me-4" href="#services">services</a></li>
                        <li class="nav-item"><a class="nav-link me-4" href="#Book">Book</a></li>
                        <li class="nav-item"><a class="nav-link me-4" href="#Categories">Categories</a></li>
                      
                        <li class="nav-item"><a class="nav-link me-4" href="#reviews">reviewe</a></li>
                        <li class="nav-item"><a class="nav-link me-4" href="#Contact">Contact</a></li>
                    </ul>
                    <div class="user-items d-flex">
                        <ul class="d-flex justify-content-end list-unstyled mb-0">

<li class="pe-3">
    @guest
    
        <a href="{{ route('login') }}">
            <svg class="user"><use xlink:href="#user"></use></svg>
        </a>
    @else

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                <svg class="user"><use xlink:href="#user"></use></svg>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <span class="dropdown-item-text"><strong>{{ Auth::user()->name }}</strong></span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person"></i> Profile
                    </a>
                </li>

                      <li> 
                    <a class="dropdown-item" href="{{ route('user.orders.index') }}">
                        <i class="bi bi-box-seam"></i> My Orders
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @endguest
</li>


    
<li class="wishlist-dropdown dropdown pe-3">
@auth
<a href="{{ route('wishlist.index') }}">
        <svg class="wishlist"><use xlink:href="#heart"></use></svg>
    </a>
                                <div class="dropdown-menu animate slide dropdown-menu-start dropdown-menu-lg-end p-3">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-primary">Your wishlist</span>
                                        <span class="badge bg-primary rounded-pill">2</span>
                                    </h4>

                                    <div class="d-flex flex-wrap justify-content-center">
                                        <a href="#" class="w-100 btn btn-dark mb-1">Add all to cart</a>
                                        <a href="{{ route('cart') }}" class="w-100 btn btn-primary">View cart</a>
                                    </div>
                                </div>
                            
             </li>
                            <li class="cart-dropdown dropdown">
                                <a href="{{ route('cart') }}" class="d-flex align-items-center">
                                    
                                <svg class="cart"><use xlink:href="#cart"></use></svg>
                                    <span class="cart-badge">{{ $cartCount ?? 0 }}</span>

                            </a>
                            @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<hr>
</header>

