@extends('pages.mitra.layouts.app')
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
                            <h3>Withdraw Controll</h3>
                            <p>Data User</p>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
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
                                        <?php $no=1; ?>
                                        @foreach($withdraws as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->bank->user->name }}</td>
                                            <td>{{ $data->nominal }}</td>
                                            <td>{{ $data->bank->bank_name }}</td>
                                            <td>{{ $data->bank->bank_nomer_rekening }}</td>
                                            <td>{{ $data->bank->bank_name_user }}</td>
                                            <td>{{ $data->status }}</td>                                                                                 
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
@if (Session::has('success_message_withdraw'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ Session::get('success_message_withdraw') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
    </script>
@endif
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
