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
        <div class="container mb-4" style="margin-bottom: 400px;">
            <div class="row">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-md-6 col-sm-12">

                            <h2 class="text-primary mb-2">Teman Tiket</h2>
                            <h2 class="mb-3">Beli Tiket Harga Teman</h2>
                            <h6 class="mb-3">Nikmati kemudahan membeli dan menjual tiket di teman tiket. Anda dapat
                                merasakan kenikmatan seperti anda
                                membeli ke teman sendiri</h6>
                            <a class="btn btn-success nav-link px-4 text-white" href="/login.html">Sign In</a>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <img src="{{ asset('user/images/banner.jpg') }}" height="300px" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card shadow p-4 ">
                        <h4 style="padding: 20px; text-align: center;">Hubungi Kami Jika Ada kendala</h4>
                        <form action="" class="">
                            <div class="mb-3 ">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleFormControlTextarea1">Curhatin Sini</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-4" style=" width: 100%; ">Submit</button>
                        </form>
                    </div>

                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card shadow ">
                        <div id="map-container-google-2" class="z-depth-1-half shadow map-container" style="height: 390px">
                            <iframe src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


</html>
