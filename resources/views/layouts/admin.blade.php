<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Admin - SAFI MOTORS')</title>
  
  <style>
    .custom-nav .nav-link {
        display: flex; /* Enable flexbox for the link */
        align-items: center; /* Align items vertically in the center */
        font-family: 'Arial', sans-serif; /* Change to your desired font */
        font-size: 16px; /* Adjust the font size as needed */
        font-weight: bold; /* Make the text bold */
        color: #ffffff; /* Text color */
        text-transform: capitalize; /* Capitalize the first letter of each word */
    }

    .custom-nav .nav-link img {
        margin-right: 10px; /* Space between image and text */
        width: 70px; /* Ensure the width is set properly */
        height: auto; /* Maintain aspect ratio */
    }
    
    .custom-nav .nav-link .fa {
        color: #ffffff; /* Color white for icons */
        
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-wight py-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}"><img class="d-block w-50"
                src="{{ asset('img/logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                {{-- <a class="nav-link active" href="{{ route('home.index') }}">Home</a> --}}
                <a class="nav-link active" href="{{ route('skoda.index') }}"><img class="d-block w-100"
                        src="{{ asset('img/SKODA.png') }}"></a>
                <a class="nav-link active" href="{{ route('cupra.index') }}"><img class="d-block w-100"
                        src="{{ asset('img/CUPRA.png') }}"></a>
                <a class="nav-link active" href="{{ route('seat.index') }}"><img class="d-block w-100"
                        src="{{ asset('img/SEAT.png') }}"></a>
                <a class="nav-link active" href="{{ route('audi.index') }}"><img class="d-block w-100"
                        src="{{ asset('img/AUDI.png') }}"></a>
                <a class="nav-link active" href="{{ route('volkswagen.index') }}"><img class="d-block w-100"
                        src="{{ asset('img/VK.png') }}"></a>
                
                <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                @guest
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
                @else
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active"
                            onclick="document.getElementById('logout').submit();">Logout</a>
                            <a class="nav-link active" href="{{ route('admin.home.index') }}">Admin Panel</a>
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>

  <div class="row g-0">
    <!-- sidebar -->
    <div class="p-3 col fixed text-white bg-dark custom-nav">
      <a href="{{ route('admin.home.index') }}" class="nav-link active text-white text-decoration-none">
        <span class="fs-4">Admin Panel</span>
      </a>
      <hr />
      <ul class="nav flex-column">
        <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white"><i class="fas fa-tachometer-alt"></i> Admin - Home</a></li>
        {{-- <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- Admin - Products</a></li> --}}
        <li><a href="{{ route('admin.skoda.index') }}" class="nav-link text-white"><img class="w-20" src="{{ asset('img/SKODAA.png') }}"> skoda</a></li>
        <li><a href="{{ route('admin.cupra.index') }}" class="nav-link text-white"><img class="w-20" src="{{ asset('img/CUPRAA.png') }}"> cupra</a></li>
        <li><a href="{{ route('admin.seat.index') }}" class="nav-link text-white"><img class="w-20" src="{{ asset('img/SEATT.png') }}"> seat</a></li>
        <li><a href="{{ route('admin.audi.index') }}" class="nav-link text-white"><img class="w-20" src="{{ asset('img/AUDII.png') }}"> audi</a></li>
        <li><a href="{{ route('admin.volkswagen.index') }}" class="nav-link text-white"><img class="w-20" src="{{ asset('img/VKK.png') }}"> volkswagen</a></li>
        {{-- <li>
          <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">Go back to the home page</a>
        </li> --}}
      </ul>
    </div>
    <!-- sidebar -->
    <div class="col content-grey">
      {{-- <nav class="p-3 shadow text-end">
        <span class="profile-font">Admin</span>
         <a href="{{ route('home.index') }}"><img class="img-profile "  src="{{ asset('/img/logo.png') }}"></a>
      </nav> --}}

      <div class="g-0 m-5">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"></a> 
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>

</html>
