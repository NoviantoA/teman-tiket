@push('css')
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
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
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Pilih Rekening</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Jumlah Penarikan</label>
                                    <input type="number" class="form-control" id="rekening" placeholder="rekening">
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
