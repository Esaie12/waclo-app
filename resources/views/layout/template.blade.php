<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>wàcló - @yield('titre') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('assets_car/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_car/owl.theme.default.min.css')}}">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Agrandir+Black">
    <style>
        body{
            font-family: 'Agrandir Black', sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: #5d5a77;
            font-style: normal
        }
    </style>

</head>

<body>

    <!--div id="preloader">
        <div id="loading-center">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div-->


    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fa fa-angle-up"></i>
    </button>


    <header class="header-one">
        <div class="top-bar  d-lg-block d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="header-top-contact">
                            <ul>
                                <li><a href="tel:{{$siteweb->telephone}}"><i class="fa fa-phone"></i>{{$siteweb->telephone}}</a></li>
                                <li><a href="#"><i class="fa fa-map-marker"></i>{{$siteweb->adresse}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--span class="socialclick"><i class="fa fa-ellipsis-v"></i></span-->
                    <!--div class="col-md-5">
                        <div class="header-top-right">
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div-->
                </div>
            </div>
        </div>

        <div id="sticky-header" class="main-header menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">

                        @include('layout.menu')

                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="minsection">

        @yield('contenu')

    </div>

    <footer class="one-footer mt-150">
        @include('layout.footer')
    </footer>

    <!--script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('assets/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="50938f46f83313fdd508aa36-|49" defer=""></script>

        <script src="{{asset('assets_car/owl.carousel.min.js')}}"></script>

        @yield('codeJs')

</body>


</html>
