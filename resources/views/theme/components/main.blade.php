<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('theme') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme') }}/assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('css')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="header-border"></div>
        @include('theme.components.navbar')

        <!-- ========== Left Sidebar Start ========== -->
        @include('theme.components.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2023 © Sistem Management Tugas Akhir.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Simata
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ asset('theme') }}/assets/js/metismenu.min.js"></script> --}}
    <script src="{{ asset('theme') }}/assets/js/waves.js"></script>



    @if (session('status'))
        <script>
            Swal.fire({
                position: 'center',
                icon: "{{ session('status')[0] }}",
                title: "{{ session('status')[1] }}",
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif


    @stack('js')

    {{-- <!-- Sparkline Js-->
        <script src="{{ asset('theme') }}/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Chart Js-->
        <script src="{{ asset('theme') }}/plugins/jquery-knob/jquery.knob.min.js"></script>

        <!-- Chart Custom Js-->
        <script src="{{ asset('theme') }}/assets/pages/knob-chart-demo.js"></script>


        <!-- Morris Js-->
        <script src="{{ asset('theme') }}/plugins/morris-js/morris.min.js"></script>

        <!-- Raphael Js-->
        <script src="{{ asset('theme') }}/plugins/raphael/raphael.min.js"></script>

        <!-- Custom Js -->
        <script src="{{ asset('theme') }}/assets/pages/dashboard-demo.js"></script>

        <!-- App js -->
        <script src="{{ asset('theme') }}/assets/js/theme.js"></script> --}}

</body>

</html>
