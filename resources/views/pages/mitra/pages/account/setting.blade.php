@push('css')
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@extends('pages.mitra.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ayo Ubah detail Profile Anda</h4>
                            <form action="">
                                <div class="form-group">
                                    <label for="exampleInputName1">Gmail</label>
                                    <input type="number" class="form-control" id="rekening" placeholder="Masukan Gmail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Password</label>
                                    <input type="number" class="form-control" id="password" name="password"
                                        placeholder="Masukan Password">
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
