@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || Checkout
@endsection
@push('css')
    <link href="{{ asset('user/style/styleku.css') }}" rel="stylesheet" />
@endpush
@section('navbar')
    @include('pages.user.layouts.navbar')
@endsection
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
                <div class="body-details mt-2   ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4>Nomor Transaksi</h4>
                    </div>
                    <hr style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex ">
                            <div class="col-6">
                                <p>Nama Event</p>
                                <p>Tanggal</p>

                            </div>
                            <div class="col-6">
                                <p>Nama Event</p>
                                <p>Tanggal</p>

                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex ">
                            <div class="col-6">
                                <p>Lokasi</p>
                                <p>Penyelenggara</p>
                            </div>
                            <div class="col-6">
                                <p>Lokasi</p>
                                <p>Penyelenggara</p>
                            </div>
                        </div>

                    </div>
                    <div>
                        <h4>Ticket Info</h4>
                        <hr style="margin-top: -5px;">
                        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Semua Ticket</button>
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
                                <h4 class="pl-3 text-center" style="margin-bottom: 0;">Scan Untuk Melihat Semua Pengunjung
                                </h4>
                                <div class="justify-content-center d-flex ">
                                    <img src="{{ asset('user/images/barcode.svg') }}" class="" width="300px"
                                        height="300px" alt="">
                                </div>

                                <div class="table-responsive">

                                    <table class="table table-striped table-responsive ">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Pengunjung</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Gmail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>0895337015446</td>
                                                <td>yusufalmaruf@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>0895337015446</td>
                                                <td>yusufalmaruf@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>0895337015446</td>
                                                <td>yusufalmaruf@gmail.com</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="btn-light d-flex card p-3  mt-4 ">
                                    <p style="margin-bottom: 0;" class="flex-grow-1">Tutorial penukaran Ticket</p>
                                    <i class="fas fa-arrow-right ms-auto" style="margin-top: -20px;"></i>
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
