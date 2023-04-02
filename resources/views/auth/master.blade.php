<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log in | Wedding Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

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


<body class="authentication-bg">

    <div class="account-pages mt-5 mb-5">
        @yield('content')
        <!-- end container -->
    </div>
    <!-- end page -->


    <!-- Vendor js -->
    <script src="{{ asset('') }}assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('') }}assets/js/app.min.js"></script>
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
