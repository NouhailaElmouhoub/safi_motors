<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'SAFI MOTORS')</title>
</head>

<body>
    <header class="masthead bg-secondary  text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'Bienvenue chez SAFI MOTORS')</h2>
        </div>
    </header>
    <!-- header -->
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
                            <a  class="nav-link active" href="{{ route('contact.index') }}">Contact</a>
                    
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


    <!-- header -->

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- footer -->
    <div class="copyright  bg-secandary py-4 text-center text-white">
        <div class="container">
            <!-- footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">

                        </div>
 
                        <div class="col-md-4">
                            <div class="footer-copyright">                            <div class="footer-logo">
                                <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="Logo">
                            </div>
                                <hr>
                                <p>Copyright @ 2024 All Right Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer -->
        </div>
    </div>
    <!-- footer -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
