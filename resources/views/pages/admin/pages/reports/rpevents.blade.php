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
                                    style="max-width: 100%">
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
