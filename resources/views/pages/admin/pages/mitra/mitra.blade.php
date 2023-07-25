@extends('pages.admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ayo Tambahkan Mitra Teman Tiket</h4>
                        <p class="card-description">
                            Semangat Cuan
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Mitra</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Nama Mitra">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Gmail Mitra</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Gmail Mitra">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Username Mitra</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Username Mitra">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password Mitra</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Password Mitra">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat Mitra</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Alamat Mitra">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Penagung Jawab</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Nama Penagung Jawab">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nomor Handphone Penangung Jawab</label>
                                <input type="text" class="form-control" id="rekening"
                                    placeholder="Nomor Handphone Penangung Jawab">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Gmail Penangung Jawab</label>
                                <input type="text" class="form-control" id="rekening"
                                    placeholder="Gmail Penangung Jawab">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat Penangung Jawab</label>
                                <input type="text" class="form-control" id="rekening"
                                    placeholder="Alamat Penangung Jawab">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- content-wrapper ends -->
    {{-- @include('admin.layout.footer') --}}
@endsection
@push('script')
@endpush
