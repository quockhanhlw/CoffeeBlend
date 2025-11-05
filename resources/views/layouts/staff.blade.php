<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>CoffeeBlend Staff</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
   <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <style>
      /* Brand logo styling to match app header */
      .brand-logo { display: flex; flex-direction: column; line-height: 1; color: #fff !important; font-weight: 700; }
      .brand-logo .logo-top { font-size: 18px; letter-spacing: 0.15rem; }
      .brand-logo .logo-bottom { font-size: 12px; letter-spacing: 0.45rem; margin-left: 2px; opacity: 0.9; }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
  <nav class="navbar header-top fixed-top navbar-expand-lg navbar-light">
      <div class="container">
      <a class="navbar-brand brand-logo" href="{{ route('staffs.dashboard') }}">
        <span class="logo-top">COFFEE</span>
        <span class="logo-bottom">BLEND</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">


      @auth('staff')

        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" style="margin-left: 20px;" href="{{ route('staffs.dashboard') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.all.staffs') }}" style="margin-left: 20px;">Staffs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all.orders.staff') }}" style="margin-left: 20px;">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all.products.staff') }}" style="margin-left: 20px;">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all.bookings.staff') }}" style="margin-left: 20px;">Bookings</a>
          </li>
        </ul>

      @endauth

        <ul class="navbar-nav ml-md-auto d-md-flex">

          @auth('staff')
          
            <li class="nav-item dropdown">
              <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::guard('staff')->user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('staff.logout') }}"onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" class="d-none">
                   @csrf
                  </form>
            </li>

          @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('view.login.staff') }}">Login</a>
              </li>
          @endauth          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid"></div>

    <div class="admin-container">
        @yield('content')
    </div>

    </div>
    </div>
  </div>
<script type="text/javascript">

</script>
</body>
</html>