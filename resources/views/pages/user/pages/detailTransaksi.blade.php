@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || Ticket Details
@endsection
@push('css')
    <link href="{{ asset('user/style/styleku.css') }}" rel="stylesheet" />
@endpush

{{-- Is Logged In --}}
@if (Auth::user())
    @section('navbar')
        @include('pages.user.layouts.navbarlogin')
    @endsection
@else
    @section('navbar')
        @include('pages.user.layouts.navbar')
    @endsection
@endif
{{-- End Is Logged In --}}

@section('content')
    <div class="page-content page-home">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Transaksi Detail
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container card shadow p-3">
                <div class="img-card"><img src="{{ asset('user/images/konser.jpg') }}" class="d-block img-fluid "
                        alt="Carousel Image" style="max-height: 200px; height: 100%; width: 100%; object-fit: cover;" />
                </div>
                <div class="body-details mt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4>Nomor Transaksi</h4>
                        <div class="btn btn-disabled text-light" style="background-color: green;" disabled>Succes</div>
                    </div>
                    <hr style="margin-top: px;">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex ">
                            <div class="col-6">
                                <p>Nama Event</p>
                                <p>Tanggal</p>
                                <p>Lokasi</p>
                                <p>Penyelenggara</p>
                            </div>
                            <div class="col-6">
                                <p>Nama Event</p>
                                <p>Tanggal</p>
                                <p>Lokasi</p>
                                <p>Penyelenggara</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex ">
                            <div class="col-6">
                                <p>Tanggal Bayar</p>
                                <p>Status</p>
                            </div>
                            <div class="col-6">
                                <p>Tanggal Bayar</p>
                                <p>Status</p>
                            </div>
                        </div>

                    </div>
                    <div>
                        <h4>Detail Transaksi</h4>
                        <hr style="margin-top: -5px;">
                        <div>
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Tiket</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>2</td>
                                        <td>Rp. 20000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>2</td>
                                        <td>Rp. 20000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="table-active">Total Bayar </td>
                                        <td>Rp. 40000</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div>
                        <h4>Ticket Info</h4>
                        <hr style="margin-top: -5px;">
                        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Konsumen 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Konsumen 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Konsumen 3</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="row p-3">
                                    <div class="col-lg-1 col-6">
                                        <p>Name :</p>
                                        <p>Email :</p>
                                        <p>Phone :</p>
                                    </div>
                                    <div class="col-lg-11 col-6">
                                        <p>Namamu</p>
                                        <p>Email</p>
                                        <p>Phone</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">...</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">...</div>
                        </div>
                    </div>

                </div>


            </div>
        </section>

    </div>
@endsection


</html>
