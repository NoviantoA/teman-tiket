@extends('pages.admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ayo Tambahkan Diskon Teman Tiket</h4>
                        <p class="card-description">
                            Semangat Cuan
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputName1">KODE DISKON</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Masukan Kode Diskon">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Jumlah Diskon</label>
                                <input type="number" class="form-control" id="rekening" placeholder="10%">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Mulai Diskon</label>
                                <input type="date" class="form-control" id="rekening" placeholder="10%">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Akhir Diskon</label>
                                <input type="date" class="form-control" id="rekening" placeholder="10%">
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
