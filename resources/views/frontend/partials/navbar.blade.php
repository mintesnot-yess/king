<!-- Topbar Section Start -->
<div class="topbar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="topbar-contact-info">
                    <ul>
                        <li><a href="mailto:info@kingsteeldoor.com"><img src="{{ asset('images/icon-mail.svg') }}" alt="">info@kingsteeldoor.com</a></li>
                        <li><a href="tel:+251911216481"><img src="{{ asset('images/icon-mail.svg') }}" alt="">+251 911 21 64 81</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-1"></div>
            <div class="col-lg-4 col-md-3">
                <div class="topbar-time">
                    <ul>
                        <li><a href="#"><img src="{{ asset('images/icon-clock.svg') }}" alt="">Mon - Sat 8:00 AM - 05:00 PM</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar Section End -->

<!-- Header Start -->
<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg p-0 fixed-top bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 80px">
                </a>

                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                            <li class="nav-item submenu"><a class="nav-link" href="#">Gallery</a>
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="#">Image Gallery</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Video Gallery</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="header-social-icons">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
<!-- Header End -->
