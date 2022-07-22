<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <title>Raito|@yield('title')</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/vendors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/vendors/css/forms/icheck/icheck.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN ROBUST CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/app.css') }}">
        <!-- END ROBUST CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/plugins/forms/checkboxes-radios.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/core/colors/palette-gradient.css') }}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/custom.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/colors-custom.css') }}">
        <!-- END Custom CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded fixed-navbar pt-0" data-open="click" data-menu="horizontal-menu" data-col="2-columns">


        @include('layoutmodule::customer.header')



        <div class="app-content content">
                <div class="content-wrapper">
                        @yield('content')
                </div>
        </div>





        @include('layoutmodule::customer.footer')

        <!-- BEGIN VENDOR JS-->
        <script src="{{ asset('admin_assets/app-assets/vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script src="{{ asset('admin_assets/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN ROBUST JS-->
        <script src="{{ asset('admin_assets/app-assets/js/core/app-menu.js') }}"></script>
        <script src="{{ asset('admin_assets/app-assets/js/core/app.js') }}"></script>
        <!-- END ROBUST JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script src="{{ asset('admin_assets/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
        <!-- END PAGE LEVEL JS-->
        <script src="{{ asset('admin_assets/app-assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
        <script src="{{ asset('admin_assets/app-assets/js/scripts/forms/checkbox-radio.js') }}"></script>
        <!-- END PAGE LEVEL JS-->

        @stack('scripts')
        <script src="{{ asset('admin_assets/js/custom.js') }}" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
</body>

</html>
