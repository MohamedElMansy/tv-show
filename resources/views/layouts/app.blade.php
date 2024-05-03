<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
        <link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}">
        <link rel="stylesheet" href="{{ asset('css/default-skin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Favicons -->
        <link rel="icon" type="image/png" href={{ asset('"icon/favicon-32x32.png') }}" sizes="32x32">
        <link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icon/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icon/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icon/apple-touch-icon-144x144.png') }}">

        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Dmitry Volkov">
        <title>Show TV – Online TV Shows</title>

    </head>
    <body class="body">
        @auth
            <header class="header">
                <div class="header__wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="header__content">
                                    <!-- header logo -->
                                    <a href="{{ route('home') }}" class="header__logo">
                                        <img src="{{ asset('img/logo.jpg') }}" alt="">
                                    </a>
                                    <!-- end header logo -->

                                    <!-- header nav -->
                                    <ul class="header__nav">
                                        <li class="header__nav-item">
                                            <a class="header__nav-link" href="{{ route('home') }}" role="button">Home</a>
                                        </li>

                                        <li class="header__nav-item">
                                            <a class="header__nav-link" href="{{ route('shows.index') }}" role="button">All Shows</a>
                                        </li>

                                        <li class="header__nav-item">
                                            <a class="header__nav-link" href="{{ route('shows.top') }}" role="button">Top 5 Shows</a>
                                        </li>

                                    </ul>
                                    <!-- end header nav -->

                                    <!-- header auth -->
                                    <div class="header__auth">
                                        <button class="header__search-btn" type="button">
                                            <i class="icon ion-ios-search"></i>
                                        </button>

                                        <a href="{{ route('logout') }}" class="header__sign-in" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon ion-ios-log-in"></i>
                                            <span>Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    <!-- end header auth -->

                                    <!-- header menu btn -->
                                    <button class="header__btn" type="button">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <!-- end header menu btn -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- header search -->
                <form action="{{ route('search') }}" method="GET" class="header__search">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="header__search-content">
                                    <input type="text" name="q" placeholder="Search for a TV Show, Episode that you are looking for">

                                    <button type="submit">search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end header search -->
            </header>
        @endauth
        <!-- end header -->


        @yield('content')
    </body>
    @auth
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- footer list -->
                    <div class="col-12 col-md-3">
                        <h6 class="footer__title">Download Our App</h6>
                        <ul class="footer__app">
                            <li><a href="#"><img src="img/Download_on_the_App_Store_Badge.svg" alt=""></a></li>
                            <li><a href="#"><img src="img/google-play-badge.png" alt=""></a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->

                    <!-- footer list -->
                    <div class="col-6 col-sm-4 col-md-3">
                        <h6 class="footer__title">Resources</h6>
                        <ul class="footer__list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Pricing Plan</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->

                    <!-- footer list -->
                    <div class="col-6 col-sm-4 col-md-3">
                        <h6 class="footer__title">Legal</h6>
                        <ul class="footer__list">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Security</a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->

                    <!-- footer list -->
                    <div class="col-12 col-sm-4 col-md-3">
                        <h6 class="footer__title">Contact</h6>
                        <ul class="footer__social">
                            <li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                            <li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                            <li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                            <li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->

                    <!-- footer copyright -->
                    <div class="col-12">
                        <div class="footer__copyright">
                            <ul>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end footer copyright -->
                </div>
            </div>
        </footer>
    @endauth
    <!-- JS -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('js/wNumb.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/plyr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.morelines.min.js') }}"></script>
    <script src="{{ asset('js/photoswipe.min.js') }}"></script>
    <script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</html>
