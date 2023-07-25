<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('admin/images/favicon.png') }}" />
    <!-- SweetAlert 2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- SweetAlert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('css')
</head>

<body>
    <div class="container-scroller">
<<<<<<< Updated upstream:resources/views/admin/layout/layout.blade.php
        @include('admin.layout.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('admin.layout.sidebar')
=======
        @include('pages.admin.layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('pages.admin.layouts.sidebar')
>>>>>>> Stashed changes:resources/views/pages/admin/layouts/app.blade.php

            @yield('content')



            <!-- main-panel ends -->
        </div>
        @include('pages.admin.layouts.footer')
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    @if (Session::has('success_message'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success_message') }}'
            });
        </script>
    @endif

    <!-- plugins:js -->
    <script src="{{ url('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('admin/js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('admin/js/off-canvas.js') }}"></script>
    <script src="{{ url('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('admin/js/template.js') }}"></script>
    <script src="{{ url('admin/js/settings.js') }}"></script>
    <script src="{{ url('admin/js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- End custom js for this page-->
    {{-- custom admin js --}}
    <script src="{{ url('admin/js/custom.js') }}"></script>
    {{-- end custom admin js --}}
    @stack('addon-script')
    @stack('scripts')

</body>

</html>