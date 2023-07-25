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
                            <h4 class="card-title">Tambahkan Tiket Untuk Event Anda</h4>
                            <p class="card-description">
                                Ayo Buat Kategori tiket yang anda jual!!
                            </p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Pilih Event Anda</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Tiket</label>
                                    <input type="text" class="form-control" id="nameticket" name="nameticket"
                                        placeholder="Masukan Nama Tiket Yang Ingin Di Jual">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLocation">Masukan Harga Tiket</label>
                                    <input type="number" class="form-control" id="priceTicket" name="priceticket"
                                        placeholder="Masukan Harga Tiket untuk Kategori ini">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLocation">Masukan Kuota Tiket</label>
                                    <input type="number" class="form-control" id="kuotaTicket" name="kuotaticket"
                                        placeholder="Masukan Harga Tiket untuk Kategori ini">
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
