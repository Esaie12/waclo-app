<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Waclo , @yield('titre') </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets_app/img/favicon.png" rel="icon">
    <link href="assets_app/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets_app/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_app/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="assets_app/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('assets_app/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets_app/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets_app/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets_app/vendor/simple-datatables/style.css')}}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{asset('assets_app/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('admin.home')}}" class="logo d-flex align-items-center">
                <img  src="{{asset('assets/img/logo-c.png')}}" alt="">
                <span class="d-none d-lg-block">WACLO</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!--div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div-->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                @include('app_layout.topMenu')
            </ul>
        </nav>

    </header><!-- End Header -->


    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            @include('app_layout.menu')

        </ul>
    </aside>

    <main id="main" class="main">
        @yield('contenu')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>WACLO</span></strong>. Tous droits recervés à l'auteur
        </div>
        <div class="credits"> Faire Par <a href="tel:+22967047668">AKM TECH</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets_app/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets_app/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets_app/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets_app/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets_app/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets_app/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets_app/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets_app/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets_app/js/main.js')}}"></script>

</body>

</html>
