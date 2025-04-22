<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>

    @include('inc.head')

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('clients/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <!-- Vendor CSS Files -->
    <link href="{{ asset('clients/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('clients/css/style.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>

<body>

<!-- ======= Header ======= -->
@include('clients.layouts.header')
<!-- End Header -->

@include('sweetalert::alert')

@yield('content')

<!-- ======= Footer ======= -->
@include('clients.layouts.footer')
<!-- End Footer -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="{{ asset('clients/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('clients/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('clients/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('clients/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('clients/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('clients/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('clients/js/main.js') }}"></script>
</body>

</html>
