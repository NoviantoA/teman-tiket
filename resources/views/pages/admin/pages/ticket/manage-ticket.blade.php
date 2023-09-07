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
                            <h3>Data Tiket</h3>
                            <p>Data - Data Tiket</p>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tiket</th>
                                            <th>Nama Event</th>
                                            <th>Penyelenggara</th>
                                            <th>Kuota</th>
                                            <th>Harga Tiket</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($ticket as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->ticket_name }}</td>
                                            <td>{{ $data->event->event_name }}</td>
                                            <td>{{ $data->event->user->name }}</td>
                                            <td>{{ $data->ticket_capacity }}</td>
                                            <td>{{ $data->event->event_price }}</td>
                                            <td class="font-weight-medium">
                                                @if($data->ticket_status == 'active')
                                                    <div class="badge badge-success">Active</div>
                                                @elseif($data->ticket_status == 'deactive')
                                                    <div class="badge badge-danger">Deactive</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <form method="POST" action="{{ route('admin.update.ticket', ['ticket_id' => $data->ticket_id]) }}">
                                                    @csrf
                                                    @method('PUT') <!-- Add the method field -->
                                                    <select class="form-control" name="ticket[{{ $data->ticket_id }}]" onchange="handleSelectChange(this, {{ $data->ticket_id }})">
                                                        <option value="deactive" @if($data->ticket_status === 'deactive') selected="selected" @endif>Deactive</option>
                                                        <option value="active" @if($data->ticket_status === 'active') selected="selected" @endif>Active</option>
                                                    </select>
                                                </form>
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
    @foreach ($ticket as $data)
    <div class="modal fade" id="update{{ $data->ticket_id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title text-white">{{ $data->ticket_name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-white">Apakah Anda Ingin Mengubah Status {{ $data->ticket_status }} dari {{ $data->ticket_name }} menjadi  <span id="selectedStatus{{ $data->ticket_id }}"></span>?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- Remove the link, as we will submit the form programmatically -->
                    <button type="button" class="btn btn-outline-light text-dark" data-dismiss="modal">Close</button>
                    <!-- Add an ID to the submit button -->
                    <button id="submitBtn{{ $data->ticket_id }}" type="button" class="btn btn-outline-light text-dark" onclick="updateStatus({{ $data->ticket_id }})">Yes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
    <script>
        function handleSelectChange(selectElement, ticketId) {
            var selectedOption = selectElement.value;
            // Show modal by ID
            $('#update' + ticketId).modal('show');

            // Set the selected option text in the modal
            var selectedOptionText = selectElement.options[selectElement.selectedIndex].text;
            $('#selectedStatus' + ticketId).text(selectedOptionText);
        }

        function updateStatus(ticketId) {
            var selectedOption = $('select[name="ticket[' + ticketId + ']"]').val();
            var formData = new FormData();
            formData.append('_method', 'PUT'); // Add the method field
            formData.append('ticket[' + ticketId + ']', selectedOption);

            fetch("{{ url('admin/update/ticket') }}" + '/' + ticketId, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload the page to reflect the updated data
                    location.reload();
                } else {
                    alert('Failed to update status. Please try again.');
                }
            })
            .catch(error => {
                alert('An error occurred while updating status. Please try again.');
                console.error('Error:', error);
            });
        }
    </script>
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
