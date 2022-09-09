<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<!-- Daterangepicker -->
<link rel="stylesheet" href="/admin/vendors/datepicker/daterangepicker.css" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap-datepicker.css') }}" />
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

<!-- Favicon -->
<!-- Favicon and Touch Icons -->
<link rel="shortcut icon" type="image/png" href="{{ url('/images/favicon.png') }}" />
<link rel="apple-touch-icon" href="{{ url('/images/apple-touch-icon.png') }}" />
<link rel="apple-touch-icon" href="{{ url('/images/apple-touch-icon-72x72.png') }}" sizes="72x72" />
<link rel="apple-touch-icon" href="{{ url('/images/images/apple-touch-icon-114x114.png') }}" sizes="114x114" />
<link rel="apple-touch-icon" href="{{ url('/images/images/apple-touch-icon-144x144.png') }}" sizes="114x114" />
<title>@yield('title', config('app.name')) | manakal.com</title>
<meta name="description" content="manakal the beauty of sri lanka that you have to visit">
<meta name="keywords" content="hotels, villas, online booking">
<meta name="author" content="manakal team">

<!-- Google reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

<!-- =======================
	header Start-->
<header class="header-static navbar-sticky navbar-light shadow">
  <!-- Search -->
  <div class="top-search collapse bg-light" id="search-open" data-parent="#search">
    <div class="container">
      <div class="row position-relative">
        <div class="col-md-8 mx-auto py-5">
          <form>
            <div class="input-group">
              <input class="form-control border-radius-right-0 border-right-0" type="text" name="search" autofocus placeholder="What are you looking for?">
              <button type="button" class="btn btn-grad border-radius-left-0 mb-0">Search</button>
            </div>
          </form>
          <p class="small mt-2 mb-0"><strong>e.g.</strong>Template, TravelGo, WordPress </p>
        </div>
        <a class="position-absolute top-0 right-0 mt-3 mr-3" data-toggle="collapse" href="#search-open"><i class="fas fa-window-close"></i></a> </div>
    </div>
  </div>
  <!-- End Search -->

  <!-- Navbar top start-->
  <div class="navbar-top d-none d-lg-block">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <!-- navbar top Left-->
        <div class="d-flex align-items-center">
          <!-- Language -->
          <div class="dropdown"> <a class="dropdown-toggle" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="dropdown-item-icon" src="/images/flag/uk.svg" alt=""> English </a>
            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownLanguage"> <span class="dropdown-item-text">Select language</span>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><img class="dropdown-item-icon" src="/images/flag/sp.svg" alt=""> Español</a> <a class="dropdown-item" href="#"><img class="dropdown-item-icon" src="/images/flag/fr.svg" alt=""> Français</a> <a class="dropdown-item" href="#"><img class="dropdown-item-icon" src="/images/flag/gr.svg" alt=""> Deutsch</a> </div>
          </div>
          <!-- Top info -->
          <ul class="nav list-unstyled ml-3">
            <li class="nav-item mr-3"> <a class="navbar-link" href="tel:+94779779574"><strong>Phone:</strong> +94 (077) 977 9574</a> </li>
            <li class="nav-item mr-3"> <a class="navbar-link" href="mailto:contact@manakal.com"><strong>Email:</strong> contact@manakal.com</a> </li>
          </ul>
        </div>

        <!-- navbar top Right-->
        <div class="d-flex align-items-center">
          <!-- Top Account -->
          {{-- <div class="dropdown"> <a class="dropdown-toggle" href="#" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-2"></i>Account </a>
            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount"> <a class="dropdown-item" href="sign-in.blade.php">Log In</a> <a class="dropdown-item" href="sign-up.blade.php">Register</a> <a class="dropdown-item" href="#">Settings</a> </div>
          </div> --}}
          <!-- top link -->
          {{-- <ul class="nav">
            <li class="nav-item"> <a class="nav-link" href="#">Contact</a> </li>
          </ul> --}}
          <!-- top social -->
          <ul class="social-icons">
            <li class="social-icons-item social-facebook m-0"> <a class="social-icons-link w-auto px-2" href="#"><i class="fab fa-facebook-f"></i></a> </li>
            <li class="social-icons-item social-instagram m-0"> <a class="social-icons-link w-auto px-2" href="#"><i class="fab fa-twitter"></i></a> </li>
            <li class="social-icons-item social-twitter m-0"> <a class="social-icons-link w-auto pl-2" href="#"><i class="fab fa-instagram"></i></a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar top End-->

  <!-- Logo Nav Start -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="/"> <img src="/images/logo-header.png" alt="travelgo"> </a>
      <!-- Menu opener button -->
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"> </span> </button>
      <!-- Main Menu Start -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <!-- Menu item 1 Demos-->
          <li class="nav-item {{ (Request::segment(1)=='') ? 'active' : '' }}"> <a class="nav-link" href="/">Home</a></li>
          <li class="nav-item {{ (Request::segment(1)=='hotels') ? 'active' : '' }}"> <a class="nav-link" href="/hotels">Hotels</a></li>
          <li class="nav-item dropdown "> <a class="nav-link dropdown-toggle" href="#" id="docMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
            <ul class="dropdown-menu" aria-labelledby="docMenu">
              @if(Auth::guard('web')->check())
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              @else
                <li><a class="dropdown-item" href="/login">Login</a></li>
                <li><a class="dropdown-item" href="/register">Register</a></li>
              @endif
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
            </ul>
        </li>
        <li class="nav-item {{ (Request::segment(1)=='about-us') ? 'active' : '' }}"> <a class="nav-link" href="/about-us">About Us</a></li>
        <li class="nav-item {{ (Request::segment(1)=='contact-us') ? 'active' : '' }}"> <a class="nav-link" href="/contact-us">Contact Us</a></li>
        <li class="nav-item {{ (Request::segment(1)=='hotel-portal') ? 'active' : '' }}"> <a class="nav-link" href="/hotel-portal">Hotel Login</a></li>

        </ul>
      </div>
      <!-- Main Menu End -->
      <!-- Header Extras Start-->
      <div class="navbar-nav">
        <!-- extra item Search-->
        <div class="nav-item search border-0 pl-3 pr-0 px-lg-2" id="search"> <a class="nav-link" data-toggle="collapse" href="#search-open"><i class="fas fa-search"></i></a> </div>
        <!-- extra item Btn-->
        @if (Session::get('currentBooking'))
            <div class="nav-item border-0 d-none d-lg-inline-block align-self-center"> <a href="/checkout" class=" btn btn-sm btn-grad text-white mb-0">Continue Booking</a> </div>
        @else
            <div class="nav-item border-0 d-none d-lg-inline-block align-self-center"> <a href="/profile" class=" btn btn-sm btn-grad text-white mb-0">{{ Auth::guard('web')->check() ? 'Profile' : 'Sign In'}}</a> </div>
        @endif
      </div>
      <!-- Header Extras End-->
    </div>
  </nav>
  <!-- Logo Nav End -->
</header>
<!-- =======================
	header End-->

    @yield('content')

<!-- =======================
	footer  -->
<footer class="footer footer-dark pt-6 position-relative">
  <div class="footer-content">
    <div class="container">
      <div class="row">
        <!-- Footer widget 1 -->
        <div class="col-md-3 col-sm-6 order-sm-1">
          <div class="widget address"> <a href="index.blade.php" class="footer-logo mb-3 d-block">
            <!-- SVG Logo Start -->
            <img src="/images/logo-footer.png" >
            <!-- SVG Logo End -->
            </a>
            <p>Are you awaiting the ideal moment to take that elusive fantasy vacation? There is actually
                 no time like the present. Action is the key to achieving your goals! Why then wait? Get in
                  touch with us, and we'll help you organize the trip of a lifetime!</p>
          </div>
        </div>
        <!-- Footer widget 2 -->
        <div class="col-md-2 col-sm-4 order-sm-3">
          <div class="widget">
            <h6>Quick LInks</h6>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Hotels</a></li>
            </ul>
          </div>
        </div>
        <!-- Footer widget 3 -->
        <div class="col-md-2 col-sm-4 order-sm-4">
          <div class="widget">
            <h6>Company</h6>
            <ul class="nav flex-column primary-hover">
              <li class="nav-item"><a class="" href="terms-conditions">Terms & Conditions</a></li>
              <li class="nav-item"><a class="nav-link" href="privacypolicy">Privacy & Policy</a></li>
            </ul>
          </div>
        </div>
        <!-- Footer widget 4 -->
        <div class="col-md-2 col-sm-4 order-sm-5">
          <div class="widget">
            <h6>Support</h6>
            <ul class="nav flex-column primary-hover">
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <!-- Footer widget 5 -->
        <div class="col-md-3 col-sm-6 order-sm-2">
          <div class="widget address">
            <ul class="list-unstyled">
              <li class="media mb-3"><i class="fas fa-map-marked-alt mr-3 display-8"></i>Colombo,Srilanka </li>
              <li class="media mb-3"><i class="mr-3 display-8 fas fa-headphones-alt"></i> +94 (077) 977 9574 </li>
              <li class="media mb-3"><i class="mr-3 display-8 far fa-envelope"></i> contact@manakal.com</li>
              <li class="media mb-3"><i class="mr-3 display-8 far fa-clock"></i>
                <p>24 Hours<p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="divider mt-3"></div>
  <!--footer copyright -->
  <div class="footer-copyright py-3">
    <div class="container">
      <div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
        <!-- copyright text -->
        <div class="copyright-text">© {{ date('Y') }} All Rights Reserved by <a href="#!"> manakal.com</a></div>
        <!-- copyright links-->

      </div>
    </div>
  </div>
</footer>
<!-- =======================
	footer  -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS-->
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/popper.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/functions.js" type="text/javascript"></script>
<script src="/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="/js/slick.js" type="text/javascript"></script>
<script src="/js/swiper.min.js" type="text/javascript"></script>
<script src="{{ asset('/js/toastr.min.js') }}"></script>
<script src="/js/main.js" type="text/javascript"></script>
<script src="/js/jquery.fancybox.min.js" type="text/javascript"></script>
<script src="/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/js/jquery-ui.min.js" type="text/javascript"></script>
<!-- Daterangepicker -->
<script src="/admin/vendors/datepicker/daterangepicker.js"></script>

@yield('scripts')
<script>

    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };

    $(document).ready(function() {

        @if(session()->has('error'))
            toastr.error('{{ session()->get('error') }}');
        @endif
        @if(session()->has('success'))
            toastr.success('{{ session()->get('success') }}');
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif

    });
</script>

{{-- "share this" link generator  --}}
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62fe69a011408d0019b6da78&product=inline-share-buttons' async='async'></script>
</body>

</html>

