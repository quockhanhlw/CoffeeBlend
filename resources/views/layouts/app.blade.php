
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
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
         <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">12 Chua Boc, Quang Trung, Dong Da, Ha Noi, Viet Nam</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">034 527 6156</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">quockhanhlw294@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
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
