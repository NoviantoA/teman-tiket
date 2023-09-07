@extends('pages.admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ayo Tambahkan Banner Untuk Memasarkan Teman Tiket</h4>
                        <p class="card-description">
                            Semangat Cuan
                        </p>
                        <form class="form-samples" action="{{ route('admin.update.banner', ['banner_id' => $banner->banner_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Banner</label>
                                <input type="text" class="form-control" name="banner_name" value="{{ $banner->banner_name }}" id="rekening" placeholder="Nama Banner">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Foto Banner</label>
                                <input type="file" class="form-control" id="rekening" name="banner_image">
                                <br>
                                @if ($banner->banner_image)
                                    <img src="{{ asset('store/admin/banner/' . $banner->banner_image) }}" width="280px" height="175px" alt="photo banner">
                                @else
                                    <p>No image found</p>
                                @endif
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
