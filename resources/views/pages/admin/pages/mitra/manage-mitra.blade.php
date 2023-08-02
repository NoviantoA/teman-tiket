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
                            <h3>User Controll</h3>
                            <p>Data User</p>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Nama Mitra </th>
                                            <th>Nomor Telephon</th>
                                            <th>Gmail</th>
                                            {{-- <th>Image Profile</th> --}}
                                            <th width="150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($mitra as $data)
                                        <tr>
                                          <td>{{ $no++ }}</td>
                                          <td>{{ $data->name }}</td>
                                          <td>{{ $data->no_telp }}</td>
                                          <td>{{ $data->email }}</td>
                                            {{-- @if ($data->img_profile)
                                            <td width="280px">
                                                <img src="{{ asset('store/user/photo/' .$data->img_profile) }}" width="280px" height="175px" alt="profile mitra">
                                            </td>
                                            @else
                                                <td>Tidak dapat menemukan gambar</td>
                                            @endif --}}
                                          <td>
                                            <a href="{{ route('admin.edit.mitra', ['id' => $data->id]) }}"  class="btn btn-warning me-2">Edit</a>
                                            <button type="submit" class="btn btn-danger me-2" data-toggle="modal"
                                            data-target="#delete{{ $data->id }}">Hapus</button>
                                            <button type="submit" class="btn btn-primary me-2">deactive</button>
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
    @foreach ($mitra as $data)
    <div class="modal fade" id="delete{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $data->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Ingin Menghapus Data Ini?&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <a href="{{ route('admin.delete.mitra', ['id' => $data->id]) }}" type="button"
                        class="btn btn-outline-light">Yes</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
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
