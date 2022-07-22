<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Adminstration Panel">
    <meta name="keywords" content="Adminstration Panel">
    <meta name="author" content="PIXINVENT">
    <title>E-commerce Adminstration Panel</title>
    <?php /*

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/bootstrap.css') }}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/fonts/icomoon.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/app-assets/vendors/css/extensions/pace.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/colors-custom.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/app.css') }}">
    <!-- END Custom CSS-->





    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/app.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/app-assets/css/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/pages/login-register.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/colors-custom.css') }}">
    <!-- END Custom CSS-->
*/ ?>




    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/app.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/app-assets/css/core/menu/menu-types/vertical-multi-level-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/colors-custom.css') }}">
    <!-- END Custom CSS-->
    <!-- END Custom CSS-->


</head>

<body class="vertical-layout vertical-mmenu 1-column   menu-expanded blank-page blank-page" data-open="click"
    data-menu="vertical-mmenu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="row content-header">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        @yield('content')
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->



    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('admin_assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('admin_assets/app-assets/vendors/js/menu/jquery.mmenu.all.min.js') }}"></script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('admin_assets/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin_assets/app-assets/js/core/app.js') }}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin_assets/app-assets/js/scripts/forms/form-login-register.js') }}"></script>
    <!-- END PAGE LEVEL JS-->



<?php /*
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('admin_assets/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/ui/tether.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/app-assets/js/core/libraries/bootstrap.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/ui/unison.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/ui/blockUI.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/ui/jquery.matchHeight-min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/ui/screenfull.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/app-assets/vendors/js/extensions/pace.min.js') }}" type="text/javascript">
    </script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('admin_assets/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    */ ?>?
</body>

</html>
