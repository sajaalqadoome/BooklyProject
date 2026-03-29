<footer id="footer" class="padding-large">
    <div class="container">
        <div class="footer-top-area">
            <div class="row d-flex flex-wrap justify-content-between">
                <div class="col-lg-3 col-sm-6 pb-3">
                    <div class="footer-menu">
                        <img src="{{ asset('User/bookly-bookstore-free-website-template/images/main-logo.png') }}" alt="logo" class="img-fluid mb-2">
                        <p>Nisi, purus vitae, ultrices nunc. Sit ac sit suscipit hendrerit.</p>
                        <div class="social-links">
                            <ul class="d-flex list-unstyled">
                                <li><a href="#"><svg class="facebook"><use xlink:href="#facebook" /></svg></a></li>
                                <li><a href="#"><svg class="instagram"><use xlink:href="#instagram" /></svg></a></li>
                                <li><a href="#"><svg class="twitter"><use xlink:href="#twitter" /></svg></a></li>
                                <li><a href="#"><svg class="linkedin"><use xlink:href="#linkedin" /></svg></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-sm-6 pb-3">
                    <div class="footer-menu text-capitalize">
                        <h5 class="widget-title pb-2">Quick Links</h5>
                        <ul class="menu-list list-unstyled">
                            <li class="menu-item mb-1"><a href="{{ url('/') }}">Home</a></li>
                            <li class="menu-item mb-1"><a href="#">About</a></li>
                            <li class="menu-item mb-1"><a href="#">Shop</a></li>
                            <li class="menu-item mb-1"><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 pb-3">
                    <div class="footer-menu text-capitalize">
                        <h5 class="widget-title pb-2">Help & Info</h5>
                        <ul class="menu-list list-unstyled">
                            <li class="menu-item mb-1"><a href="#">Track Order</a></li>
                            <li class="menu-item mb-1"><a href="#">Returns</a></li>
                            <li class="menu-item mb-1"><a href="#">Shipping</a></li>
                            <li class="menu-item mb-1"><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 pb-3">
                    <div class="footer-menu contact-item">
                        <h5 class="widget-title pb-2">Contact Us</h5>
                        <p>Email: <a href="mailto:info@bookly.com">info@bookly.com</a></p>
                        <p>Phone: <a href="tel:+123456789">+123 456 789</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<hr>
<div id="footer-bottom" class="mb-2">
    <div class="container">
        <div class="copyright text-center">
            <p>© {{ date('Y') }} Bookly. All Rights Reserved.</p>
        </div>
    </div>
</div>

<script src="{{ ('User/bookly-bookstore-free-template/js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('User/bookly-bookstore-free-template/js/script.js') }}"></script>

@stack('scripts')