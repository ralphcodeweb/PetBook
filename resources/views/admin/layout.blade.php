<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Ralphcode - Admin & Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/sheruadmin/images/logo-f.png">

        <!-- App plugin css -->
        @stack('plugincss')

        <!-- App css -->
        <link href="/sheruadmin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        {{-- <link href="/sheruadmin/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" /> --}}
        <link href="/sheruadmin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/sheruadmin/css/app.min.css" rel="stylesheet" type="text/css" />
        {{-- <link href="/sheruadmin/css/app-dark.min.css" rel="stylesheet" type="text/css" /> --}}
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="{{ route('dashboard') }}" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="/sheruadmin/images/logo-final.png" alt="" height="35" />
                        </span>
                        <span class="logo-sm">
                            <img src="/sheruadmin/images/logo-f.png" alt="" height="24">
                        </span>
                    </a>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.partials.nav')

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row page-title">
                            <div class="col-md-12">
                                @yield('header')
                            </div>
                        </div>
                        <div class="row">

                            @if(session('flash'))
                            <div class="col-lg-8">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('flash') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                        @yield('content')
                    </div> <!-- container-fluid -->
                </div> <!-- content -->

                <!-- Footer Start -->
                @include('admin.partials.footer')
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="/sheruadmin/js/vendor.min.js"></script>

        <!-- App plugin js -->
        @stack('pluginjs')

        <script>
            let logout = () => {
                event.preventDefault();
                document.getElementById('form-logout').submit();
            };
        </script>

        <!-- App js -->
        <script src="/sheruadmin/js/app.min.js"></script>
    </body>
</html>