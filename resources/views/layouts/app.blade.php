
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- My files -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
  <!-- Removed local jquery.timepicker.css to avoid conflicts with CDN version below -->

    
        <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Custom CSS to fix navbar -->
        <style>
            .ftco-navbar-light {
                background: #000 !important;
                position: relative !important;
                top: auto !important;
                left: auto !important;
                right: auto !important;
                z-index: 1000 !important;
                display: block !important;
                visibility: visible !important;
            }
            .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
                color: #fff !important;
                opacity: 1 !important;
                display: block !important;
                visibility: visible !important;
            }
            .navbar-nav {
                display: flex !important;
                flex-direction: row !important;
                visibility: visible !important;
            }
            .navbar-collapse {
                display: flex !important;
                visibility: visible !important;
            }
            .navbar-collapse.show {
                display: flex !important;
                visibility: visible !important;
            }
            .navbar-collapse:not(.show) {
                display: flex !important;
                visibility: visible !important;
            }
            #ftco-navbar {
                display: block !important;
                visibility: visible !important;
            }
            #ftco-nav {
                display: flex !important;
                visibility: visible !important;
            }
        </style>

    <!-- Ensure timepicker dropdown appears above booking form and other elements -->
    <style>
      /* jquery.timepicker uses .ui-timepicker-wrapper; its stylesheet sets z-index:10001.
         Some page containers create stacking contexts or use overflow which clips the dropdown.
         Make the wrapper fixed and give it a very high z-index so the list displays on top. */
      .ui-timepicker-wrapper {
        position: fixed !important;
        z-index: 999999 !important;
      }
      /* Also ensure inner list inherits the stacking context */
      .ui-timepicker-list {
        z-index: 999999 !important;
      }

      /* Footer Layout Improvements */
      .ftco-footer .ftco-footer-widget {
        padding: 0 15px;
      }
      
      .ftco-footer .row.mb-5 {
        margin-left: -15px;
        margin-right: -15px;
      }
      
      .ftco-footer .col-lg-3 {
        padding-left: 15px;
        padding-right: 15px;
        display: flex;
        align-items: stretch;
      }
      
      .ftco-footer .ftco-footer-widget {
        width: 100%;
        min-height: 100%;
        display: flex;
        flex-direction: column;
      }
      
      .ftco-footer .ftco-footer-widget h2 {
        margin-bottom: 25px;
        font-size: 18px;
        line-height: 1.2;
      }
      
      .ftco-footer .ftco-footer-widget p,
      .ftco-footer .ftco-footer-widget ul {
        flex-grow: 1;
      }
      
      .ftco-footer .ftco-footer-widget ul.list-unstyled li {
        margin-bottom: 8px;
      }
      
      .ftco-footer .ftco-footer-widget ul.list-unstyled li a {
        padding: 5px 0;
        transition: color 0.3s ease;
      }
      
      .ftco-footer .ftco-footer-widget ul.list-unstyled li a:hover {
        color: #c49b63;
        text-decoration: none;
      }
      
      .ftco-footer .block-23 ul li {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
      }
      
      .ftco-footer .block-23 ul li .icon {
        margin-right: 15px;
        margin-top: 3px;
        color: #c49b63;
      }
      
      .ftco-footer .block-23 ul li .text {
        flex-grow: 1;
        line-height: 1.5;
      }
      
      .ftco-footer-social {
        margin-top: auto;
        padding-top: 20px;
      }
      
      @media (max-width: 991px) {
        .ftco-footer .col-lg-3 {
          margin-bottom: 30px;
        }
        
        .ftco-footer .ftco-footer-widget {
          min-height: auto;
        }
      }
    </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ url('/') }}">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse show" id="ftco-nav">
	        <ul class="navbar-nav ms-auto">
	          <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{ route('products.menu') }}" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="{{ route('services') }}" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
	          <li class="nav-item cart"><a href="{{ route('cart') }}" class="nav-link"><span class="icon icon-shopping_cart"></span></a></li>
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.orders') }}">
                              My Orders
                            </a>
                            <a class="dropdown-item" href="{{ route('users.bookings') }}">
                              My Bookings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    @if (Route::has('login'))
		            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">LOGIN</a></li>
                    @endif

                    @if (Route::has('register'))
		            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">REGISTER</a></li>
                    @endif
                @endauth

	        </ul>
	      </div>
		</div>
	  </nav>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="{{ route('about') }}" style="color: #c49b63; text-decoration: none;">About Us</a></h2>
              <p>CoffeeBlend is more than just our name; it's our promise. A living testament to our commitment to quality, community, and the perfect cup of coffee.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                <li class="ftco-animate"><a href="https://github.com/quockhanhlw" target="_blank" title="GitHub"><span class="icon-github"></span></a></li>
                <li class="ftco-animate"><a href="https://web.facebook.com/nguyen.van.anh.435199" target="_blank" title="Facebook"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/reallqk__/" target="_blank" title="Instagram"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Coffee</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('products.menu') }}" class="py-2 d-block">Menu</a></li>
                <li><a href="{{ route('services') }}" class="py-2 d-block">Services</a></li>
                <li><a href="{{ route('about') }}" class="py-2 d-block">About Us</a></li>
                <li><a href="{{ route('contact') }}" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Our Specialties</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('products.menu') }}" class="py-2 d-block">Specialty Coffee</a></li>
                <li><a href="{{ route('products.menu') }}" class="py-2 d-block">Fresh Pastries</a></li>
                <li><a href="{{ route('products.menu') }}" class="py-2 d-block">Artisan Drinks</a></li>
                <li><a href="{{ route('products.menu') }}" class="py-2 d-block">Light Meals</a></li>
                <li><a href="{{ url('/') }}" class="py-2 d-block">Table Booking</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contact Info</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li>
	                  <span class="icon icon-map-marker"></span>
	                  <span class="text">12 Chua Boc, Quang Trung<br>Dong Da, Ha Noi, Viet Nam</span>
	                </li>
	                <li>
	                  <span class="icon icon-phone"></span>
	                  <span class="text"><a href="tel:0345276156" style="color: inherit;">034 527 6156</a></span>
	                </li>
	                <li>
	                  <span class="icon icon-envelope"></span>
	                  <span class="text"><a href="mailto:quockhanhlw294@gmail.com" style="color: inherit;">quockhanhlw294@gmail.com</a></span>
	                </li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p style="margin: 0; padding: 20px 0; border-top: 1px solid rgba(255,255,255,0.1);">
              &copy; {{ date('Y') }} CoffeeBlend. All rights reserved. | Designed with <span style="color: #c49b63;">♥</span> by Khanh Luu
            </p>
          </div>
        </div>
      </div>
            </footer>

    <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/aos.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('assets/js/google-map.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        
        @stack('scripts')
    </body>
</html>
