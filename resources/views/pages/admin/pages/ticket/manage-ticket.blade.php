@extends('pages.admin.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('all/vendors/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('all/vendors/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('all/vendors/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
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
                                <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tiket</th>
                                            <th>Nama Event</th>
                                            <th>Penyelenggara</th>
                                            <th>Kuota</th>
                                            <th>Harga Tiket</th>
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
                    <h4 class="modal-title">{{ $data->ticket_name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Ingin Mengubah Status {{ $data->ticket_status }} dari {{ $data->ticket_name }} menjadi  <span id="selectedStatus{{ $data->ticket_id }}"></span>?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- Remove the link, as we will submit the form programmatically -->
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <!-- Add an ID to the submit button -->
                    <button id="submitBtn{{ $data->ticket_id }}" type="button" class="btn btn-outline-light" onclick="updateStatus({{ $data->ticket_id }})">Yes</button>
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
    <script src="{{ asset('all/vendors/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('all/vendors/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('all/vendors/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('all/vendors/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('all/vendors/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('all/vendors/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('all/vendors/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('all/vendors/jquery-datatable/buttons/buttons.print.min.js') }}"></script>




    <!-- page js file -->
    {{-- <script src="{{ asset('all/vendor/bundles/mainscripts.bundle.js') }}"></script> --}}
    <script src="{{ asset('all/vendors/bundles/jquery-datatable.js') }}"></script>
@endpush
