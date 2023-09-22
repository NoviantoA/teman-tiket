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
                        <form class="form-samples" action="{{ route('admin.add.mitra') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Mitra</label>
                                <input type="text" class="form-control" name="name" id="rekening" placeholder="Nama Mitra">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputName1">Bank</label>
                                <select name="bank_id" id="bank_id" class="form-control js-example-basic-single" style="width: 100%; height: 50px;">
                                    <option value="" selected="selected">--- Pilih Nama Rekening Bank---</option>
                                    @foreach ($bankData as $data)
                                        <option value="{{ $data->bank_id }}">{{ $data->bank_name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="exampleInputName1">Nama Penagung Jawab</label>
                                <input type="text" class="form-control" id="rekening" placeholder="Nama Penagung Jawab">
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputName1">Nomor Handphone</label>
                                <input type="text" class="form-control" id="rekening" name="no_telp" value="+62"
                                    placeholder="Nomor Handphone Penangung Jawab">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Gmail Mitra</label>
                                <input type="text" class="form-control" id="rekening" name="email" placeholder="Gmail Mitra">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password Mitra</label>
                                <input type="password" class="form-control" id="rekening" name="password" placeholder="Password Mitra">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat Mitra</label>
                                <input type="text" class="form-control" id="rekening" name="address" placeholder="Alamat Mitra">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputName1">Image</label>
                                <input type="file" class="form-control" id="rekening" name="img_profile">
                            </div> --}}
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
