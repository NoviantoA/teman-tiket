@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('all/vendors/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('all/vendors/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('all/vendors/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">


{{-- Bootstrap CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
{{-- END Bootstrap CSS --}}

{{-- Bootstrap Icon --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
{{-- End Bootstrap Icon --}}
@endpush
@extends('pages.mitra.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 col-lg-12 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-3 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Keseluruhan Pendapatan</p>
                                    <p class="fs-30 mb-4">3</p>
                                    <p>Jumlah keseluruhan pendapatan dari penjualan tiket</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4  stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Pendapatan Untuk Di Wihthdraw</p>
                                    <p class="fs-30 mb-4">34040</p>
                                    <p>Jumlah pendapatan yang Belum di withdraw</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Withdraw</p>
                                    <p class="fs-30 mb-4">47033</p>
                                    <p>Jumlah Withdraw yang telah dilakukan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Pendapatan yang telah di withdraw</p>
                                    <p class="fs-30 mb-4">61344</p>
                                    <p>Jumlah pendapatan yang telah sukses di withdraw</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ayo lakukan Withdraw Ke rekening Anda</h4>
                            <p class="card-description">
                                Gass cairkan pendapatan penjualan tiket anda
                            </p>
                            <form class="forms-sample" action="{{ route('withdraw.add') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Pilih Rekening</label>
                                    <select name="bank_id" id="bank_id" class="form-control js-example-basic-single">
                                        <option value="" selected="selected">--- Pilih Rekening Bank---</option>
                                        @foreach ($bankData as $data)
                                            <option value="{{ $data->bank_id }}">{{ $data->bank_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Jumlah Penarikan</label>
                                    <input type="number" name="nominal" class="form-control" id="rekening" placeholder="rekening">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('pages.mitra.layouts.footer')
        @push('scripts')
            <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
            <script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
            <script src="{{ asset('admin/js/select2.js') }}"></script>
        @endpush

    </div>
@endsection
