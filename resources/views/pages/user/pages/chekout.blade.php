@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || Checkout
@endsection
@push('css')
    <link href="{{ asset('user/style/styleku.css') }}" rel="stylesheet" />
@endpush
@section('navbar')
    @include('pages.user.layouts.navbarlogin')
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
                                    Checkout Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="ticket-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-4">
                        <div class="card ">
                            <div class="detail-header text-center p-3">
                                <h3 class="">Event Detail</h3>
                                <hr>
                            </div>
                            <div class="detail-body justify-content-center p-3">
                                <img src="{{ asset('user/images/banner.jpg') }}" style="margin-top: -30px;" width="100%"
                                    height="200px" alt="" class="">
                                <h6 class="mt-2">Konser Kenangan 2023</h6>
                                <div class="owner" style="margin-top: -10px;">By Surabaya Music</div>
                                <div class="owner"> <i class="fas fa-map-marker-alt"></i> Surabaya</div>
                                <div class="owner"><i class="far fa-calendar"></i> 12 Juli 2022</div>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-8 col-12">
                        <section class="card p-3 shadow">
                            <h3 class="text-center">Registration Data</h3>
                            <hr>
                            <div class="form-regist-ticket">
                                <form action="">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="exampleInputPassword1"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Gender</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>


                                </form>
                            </div>
                        </section>
                        <section class="mt-4 p-3 card shadow">
                            <h4 class="text-center">Registration ticket</h4>
                            <hr>
                            <div class="form-regist-ticket">
                                <form action="">
                                    <div class="form-row d-flex justify-content-between">
                                        <button class="btn mb-3" disabled>Ticket 1</button>
                                        <div class="form-check form-check-inline ml-auto">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Same as Registration
                                                Data</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="exampleInputPassword1"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Gender</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </section>
                        <section class="mt-4 p-3 card shadow">
                            <h4 class="text-center">Ticket Details</h4>
                            <hr>
                            <label for="">Normal</label>
                            <div class="d-flex justify-content-between">
                                <p>price</p>
                                <p class="ml-auto">Jumlah Tiket</p>
                                <p class="ml-auto">Jumlah harga tiket</p>
                            </div>

                        </section>
                        <section class="mt-4 p-3 card shadow">
                            <h4 class="text-center">Payment Method</h4>
                            <hr>
                            <div class="form-regist-ticket d-flex justify-content-between pl-4 pr-4">
                                <button class="btn" style="background-color: silver;">Bank Transfer</button>
                                <button class="btn" style="background-color: silver;">E-Wallet</button>
                                <button class="btn" style="background-color: silver;">Q-Ris</button>
                            </div>
                        </section>
                        <section class="mt-4 p-3 card shadow">
                            <h4 class="text-center">Voucher</h4>
                            <hr>
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary text-dark" type="button"
                                        id="button-addon2">Gunakan</button>
                                </div>
                            </div>

                        </section>
                        <section class="mt-4 p-3 card shadow">
                            <h4 class="text-center">Payment Details</h4>
                            <hr>
                            <label class="pl-2" for=""> ticket Awal</label>
                            <div class="d-flex justify-content-between">
                                <p>price</p>
                                <p class="ml-auto">Jumlah Tiket</p>
                                <p class="ml-auto">Jumlah harga tiket</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p>fee apk</p>
                                <p class="ml-auto">harga Services</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5>Total Payment</h5>
                                <p class="ml-auto">harga Services</p>
                            </div>
                            <button class="btn">Bayar</button>

                        </section>

                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection


</html>
