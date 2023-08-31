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
                            <h3>Data Event</h3>
                            <p>Data - Data Event</p>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover  dataTable js-exportable"
                                   >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama event</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Tanggal Event</th>
                                            <th>Location</th>
                                            <th>City</th>
                                            <th>poster</th>
                                            <th>Deskripsi</th>
                                            <th>Tag</th>
                                            <th>Jenis Tiket</th>
                                            <th>Jumlah Tiket</th>
                                            {{-- <th>Talent</th> --}}
                                            <th width="50px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($event as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->event_name }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->event_date }}</td>
                                            <td>{{ $data->event_location }}</td>
                                            <td>{{ $data->event_city }}</td>
                                            <td>
                                                <div class="brand-logo">
                                                    <img src="{{ url('store/mitra/events/' . $data->event_poster) }}" width="250px" alt="logo">
                                                  </div>
                                            </td>
                                            <td>{{ $data->event_description }}</td>
                                            <td>{{ $data->event_tag }}</td>
                                            <td>{{ $data->ticket->ticket_name }}</td>
                                            <td>{{ $data->ticket->ticket_capacity }}</td>
                                            {{-- <td>5</td> --}}
                                            <td class="text-center">
                                                <form method="POST" action="{{ route('admin.update.event', ['event_id' => $data->event_id]) }}">
                                                    @csrf
                                                    @method('PUT') <!-- Add the method field -->
                                                    <select class="form-control" name="event[{{ $data->event_id }}]" onchange="handleSelectChange(this, {{ $data->event_id }})">
                                                        <option value="deactive" @if($data->event_status === 'deactive') selected="selected" @endif>Deactive</option>
                                                        <option value="active" @if($data->event_status === 'active') selected="selected" @endif>Active</option>
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
    @foreach ($event as $data)
    <div class="modal fade" id="update{{ $data->event_id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $data->event_name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Ingin Mengubah Status {{ $data->event_status }} dari {{ $data->event_name }} menjadi  <span id="selectedStatus{{ $data->event_id }}"></span>?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- Remove the link, as we will submit the form programmatically -->
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <!-- Add an ID to the submit button -->
                    <button id="submitBtn{{ $data->event_id }}" type="button" class="btn btn-outline-light" onclick="updateStatus({{ $data->event_id }})">Yes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
    <script>
        function handleSelectChange(selectElement, eventId) {
            var selectedOption = selectElement.value;
            // Show modal by ID
            $('#update' + eventId).modal('show');

            // Set the selected option text in the modal
            var selectedOptionText = selectElement.options[selectElement.selectedIndex].text;
            $('#selectedStatus' + eventId).text(selectedOptionText);
        }

        function updateStatus(eventId) {
            var selectedOption = $('select[name="event[' + eventId + ']"]').val();
            var formData = new FormData();
            formData.append('_method', 'PUT'); // Add the method field
            formData.append('event[' + eventId + ']', selectedOption);

            fetch("{{ url('admin/update/event') }}" + '/' + eventId, {
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
