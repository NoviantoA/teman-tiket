@extends('pages.admin.layouts.app')
@push('css')
 <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('admin/table/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/table/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/table/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
 <style>
   .dataTables_wrapper .dataTable .btn {
       padding: 1rem 1rem;
   }
</style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="header">
                            <h3>Withdraw Controll</h3>
                            <p>Data User</p>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">Id Withdraw</th>
                                            <th>Mitra </th>
                                            <th>Nominal</th>
                                            <th>Bank</th>
                                            <th>Rekening</th>
                                            <th>Nama Pemilik Rekening</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>0895337015446</td>
                                            <td>Hello</td>
                                            <td>Hello</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->
    {{-- @include('admin.layout.footer') --}}
@endsection
@push('scripts')
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
    <script src="{{ asset('all/vendors/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('all/vendors/bundles/vendorscripts.bundle.js') }}"></script>

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




    <!-- page js file -->
    {{-- <script src="{{ asset('all/vendor/bundles/mainscripts.bundle.js') }}"></script> --}}
    <script src="{{ asset('all/vendors/bundles/jquery-datatable.js') }}"></script>
@endpush
