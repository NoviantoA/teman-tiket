<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Teman Tiket</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/js/select.dataTables.min.css') }}">
    <!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ url('admin/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{ url('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('admin/images/favicon.png') }}" />
     <!-- Font Awesome -->
     <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
     <!-- DataTables -->
     <link rel="stylesheet" href="{{ asset('admin/table/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('admin/table/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('admin/table/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
     <!-- Bootstrap Color Picker -->
     <link rel="stylesheet"
         href="{{ url('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ url('admin/dist/css/admin.min.css') }}">
        <!-- SweetAlert 2 CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
      <!-- SweetAlert  -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('css')
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
    <!-- jQuery -->
    <script src="{{ url('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
<script src="{{ asset('admin/table/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/table/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/table/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/table/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('admin/dist/js/demo.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{ url('admin/plugins/dropzone/min/dropzone.min.js')}}"></script>

    @stack('scripts')
</head>

<body>
    <div class="container-scroller">
        @include('pages.admin.layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('pages.admin.layouts.sidebar')
            <div class="main-panel">
                @yield('content')
                @include('pages.admin.layouts.footer')


            </div>




            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    @if (Session::has('success_message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ Session::get('success_message') }}",
                showConfirmButton: false,
                timer: 3000 // milliseconds
            });
            </script>
    @endif

    @if(Session::has('error_message_not_found'))
@push('scripts')
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ Session::get('error_message_not_found') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
    </script>
@endpush
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
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
            icon: 'error',
            title: 'Error!',
            html: '{{ $error }}'
        });
    </script>
@endforeach
@endif

@if(Session::has('error_message_update_details'))
@push('scripts')
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ Session::get('error_message_update_details') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
    </script>
@endpush
@endif

@if(Session::has('error_message_delete'))
@push('scripts')
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ Session::get('error_message_delete') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
    </script>
@endpush
@endif

@if(Session::has('success_message_create'))
@push('scripts')
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ Session::get('success_message_create') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
    </script>
@endpush
@endif

@if(Session::has('success_message_update'))
@push('scripts')
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ Session::get('success_message_update') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
    </script>
@endpush
@endif

@if(Session::has('success_message_delete'))
@push('scripts')
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ Session::get('success_message_delete') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
    </script>
@endpush
@endif

   <!-- plugins:js -->
<script src="{{ url('admin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ url('admin/vendors/chart.js/Chart.min.js') }}"></script>
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
<!-- Custom js for this page-->
<script src="{{ url('admin/js/dashboard.js') }}"></script>
<script src="{{ url('admin/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->
{{-- custom admin js --}}
<script src="{{ url('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ url('admin/js/select2.js')}}"></script>
<script src="{{ url('admin/js/custom.js') }}"></script>
{{-- end custom admin js --}}
    @stack('scripts')

</body>

</html>
