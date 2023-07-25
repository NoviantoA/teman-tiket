@push('css')
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@extends('pages.mitra.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row container">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                            <h6 class="font-weight-normal mb-0">Thank You for being Mitra's Teman Tiket</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ayo Tambahkan Rekening Anda</h4>
                            <p class="card-description">
                                Pastikan Nomor Rekneing anda tepat yah!! jangan sampai salah nomor rekeningnya
                            </p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Jenis Bank</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="rekening" placeholder="rekening">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLocation">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="pemilik" placeholder="pemilik">
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
