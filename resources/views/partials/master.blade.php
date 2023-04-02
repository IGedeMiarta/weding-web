<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? '' }} | Wedding Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

    <!-- third party css -->
    <link href="{{ asset('') }}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- dropify -->
    <link href="{{ asset('') }}assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('') }}assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />
    <script src="{{ asset('') }}assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('') }}assets/css/sweetalert2.min.css">


</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('partials.topbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('partials.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right bar overlay-->
    {{-- <div class="rightbar-overlay"></div>

    <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-cog-outline mdi-spin"></i> &nbsp;Choose Demos
    </a> --}}

    <!-- Vendor js -->
    <script src="{{ asset('') }}assets/js/vendor.min.js"></script>
    <!-- dropify js -->
    <script src="{{ asset('') }}assets/libs/dropify/dropify.min.js"></script>

    <!-- form-upload init -->
    <script src="{{ asset('') }}assets/js/pages/form-fileupload.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('') }}assets/js/app.min.js"></script>\

    <!-- knob plugin -->
    <script src="{{ asset('') }}assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    {{-- <script src="{{ asset('') }}assets/libs/morris-js/morris.min.js"></script> --}}
    <script src="{{ asset('') }}assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init js-->
    <script src="{{ asset('') }}assets/js/pages/dashboard.init.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.js"></script>
    <!-- third party js -->
    <script src="{{ asset('') }}assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/buttons.flash.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables/dataTables.select.min.js"></script>
    <script src="{{ asset('') }}assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}assets/libs/pdfmake/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('') }}assets/js/pages/datatables.init.js"></script>

    @stack('script')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        $('#btnTest').on('click', function() {
            Toast.fire({
                icon: 'error',
                title: 'Signed in successfully'
            })
        })
    </script>
    @if (session()->has('success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ session()->get('success') }}"
            })
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Toast.fire({
                icon: 'error',
                title: "{{ session()->get('error') }}"
            })
        </script>
    @endif
</body>

</html>
