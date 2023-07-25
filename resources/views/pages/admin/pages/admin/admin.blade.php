@extends('pages.admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ayo Tambahkan Admin</h4>
                        <p class="card-description">
                            Biar Enak
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Admin</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Masukan Kode Diskon">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Gmail</label>
                                <input type="text" class="form-control" id="rekening" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password</label>
                                <input type="text" class="form-control" id="rekening" placeholder="">
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
