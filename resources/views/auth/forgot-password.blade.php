<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Waclo | Mot de passe oublié</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets_app/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets_app/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets_app/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets_app/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets_app/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets_app/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('assets_app/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('assets_app/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('assets_app/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets_app/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
    <div class="container">

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
                <a href="{{route('index')}}" class="logo d-flex align-items-center w-auto">
                    <img  src="{{asset('assets/img/logo-c.png')}}" alt="">
                    <span class="d-none d-lg-block">WACLO</span>
                </a>
            </div>
            <h2>Mot de passe oublié ?</h2>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @php
                if (request()->routeIs('admin.forgot')) {
                    $routeForgotPassword = route('admin.forgot-password');
                } elseif (request()->routeIs('agent.forgot')) {
                    $routeForgotPassword = route('agent.forgot-password');
                }elseif (request()->routeIs('password.request')) {
                    $routeForgotPassword = route('password.request');
                }
            @endphp
            <form action="{{ $routeForgotPassword }}" method="POST">
                @csrf
                @if (Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                    </div>
                @endif

                @if (Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Nous vous avons envoyé par email le lien de réinitialisation du
                            mot de passe !</strong>
                    </div>
                @endif
                <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-12">
                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" style="width: 100%; max-width: 600px;">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name="reset" id="reset" class="btn btn-primary">Réinitialiser</button>
                </div>
            </form>

            <div class="credits mt-3">
                Designed by <a href="tel:+22961102637">AKM TECH</a>
            </div>
        </section>

    </div>
</main>
<!-- End #main -->
<style>
    #email {
        width: 100% !important;
        max-width: 600px !important; /* Ajuste cette valeur si nécessaire */
    }
</style>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets_app/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets_app/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets_app/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('assets_app/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('assets_app/vendor/quill/quill.js')}}"></script>
    <script src="{{ asset('assets_app/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('assets_app/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('assets_app/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets_app/js/main.js')}}"></script>

</body>

</html>
