<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    {{-- <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."> --}}
    {{-- <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app"> --}}
    <meta name="author" content="PIXINVENT">
    <title>Ascend Dashboards</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css"> --}}
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap1.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended1.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors1.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components1.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/bordered-layout.css">

    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    {{-- <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-ecomme rce.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/charts/chart-apex.css"> --}}
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/dashboard.css">

    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css"> --}}
    <!-- END: Custom CSS-->
    <style>
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #5897fb !important;
            color: white;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #002E6E;
        }

        .card .card-header{
            background:linear-gradient(118deg, #002E6E, rgba(0, 46, 110, 0.7));
            margin-bottom: 20px
        }

        .card-header h4 ,h2{
            color:white;
        }
        .main-menu .navbar-header .navbar-brand .brand-logo img{
            margin-left: 11px;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">


    @include('layouts.partials.navbar')

    @include('layouts.partials.sidebar')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a class="ml-25" href="https://ascend.com.sa/" target="_blank">ASCEND Healthcare Solution</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-block d-md-inline-block mt-25">v1.0.0</span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    {{-- <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script> --}}
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script> -->
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script> --}}
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="/app-assets/js/scripts/forms/pickers/form-pickers.js"></script> --}}
    <!-- END: Page JS-->

    <script src="/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>

    <!-- BEGIN: Page JS-->
    {{-- <script src="/app-assets/js/scripts/cards/card-statistics.js"></script> --}}
    <!-- END: Page JS-->

    @stack('script')
    {{-- <script type="text/javascript">

    </script> --}}
    <script>
        window.Trengo = window.Trengo || {};
        window.Trengo.key = '416PrOKK7EGCuAsPJVsP';
        (function(d, script, t) {
            script = d.createElement('script');
            script.type = 'text/javascript';
            script.async = true;
            script.src = 'https://static.widget.trengo.eu/embed.js';
            d.getElementsByTagName('head')[0].appendChild(script);
        }(document));

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    @include('sweetalert::alert')
</body>
<!-- END: Body-->

</html>
