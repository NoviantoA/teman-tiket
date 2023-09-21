@extends('pages.admin.layouts.app')
@push('css')
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
                            <h3>Data Tiket</h3>
                            <p>Data - Data Tiket</p>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Event</th>
                                            <th>Jenis Tiket</th>
                                            <th>Buyer</th>
                                            <th>Jumlah Tiket</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($transaksi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->event->event_name }}</td>
                                            <td>{{ $data->ticket->ticket_name }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->transaction_ticket_count }}</td>
                                            <td>{{ $data->transaction_total }}</td>
                                            <td>
                                               @if ($data->transaction_is_paid === 0)
                                                   <div class="badge badge-danger">Belum Dibayar</div>
                                                @elseif ($data->transaction_is_paid === 1)
                                                    <div class="badge badge-success">Terbayar</div>
                                               @endif
                                            </td>
                                        </tr>
                                        @endforeach

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
