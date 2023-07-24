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
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Ticket</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Use
                        Ticket</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Expired
                        Ticket</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- //iki copyn -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card  mt-2 mb-2">
                        <div class="row p-3 d-flex align-items-center justify-content-between">
                            <div class="col text-center">
                                <p class="mb-0">Judul Event</p>
                            </div>
                            <div class="col text-center">
                                <p class="mb-0">Tanngal Event</p>
                            </div>
                            <div class="col text-center">
                                <p class="mb-0">Status</p>
                            </div>
                            <div class="col text-center">
                                <p class="btn btn-sm btn-success mb-0">View Ticket</p>
                            </div>
                        </div>
                    </div>
                    <div class="card  mt-2 mb-2">
                        <div class="row p-3 d-flex align-items-center justify-content-between">
                            <div class="col text-center">
                                <p class="mb-0">Judul Event</p>
                            </div>
                            <div class="col text-center">
                                <p class="mb-0">Jumlah Bayar</p>
                            </div>
                            <div class="col text-center">
                                <p class="mb-0">Status</p>
                            </div>
                            <div class="col text-center">
                                <p class="btn btn-sm btn-success mb-0">View Ticket</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...
                </div>
            </div>
        </div>
    </div>
@endsection


</html>
