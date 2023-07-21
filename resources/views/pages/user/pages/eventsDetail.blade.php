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
    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Product Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-gallery" id="gallery">
            <div class="container">

                <img src="{{ asset('user/images/banner.jpg') }}" width="100%" style="max-height: 400px" alt="">
            </div>
        </section>
        <div class="store-details-container mt-4" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>Konser Kemesraan</h1>
                            <div class="mb-2">By Surabaya Music</div>
                            <div class="mb-2" style="color: orange"> <i class="fas fa-map-marker-alt"></i>
                                Surabaya</div>
                            <div class="mb-2" style="color: orange"><i class="far fa-calendar"></i> 12 Juli
                                2022</div>
                            <p class="mb-2">
                                The Nike Air Max 720 SE goes bigger than ever before with
                                Nike's tallest Air unit yet for unimaginable, all-day comfort.
                                There's super breathable fabrics on the upper, while colours
                                add a modern edge.
                            </p>
                            <p>
                                Bring the past into the future with the Nike Air Max 2090, a
                                bold look inspired by the DNA of the iconic Air Max 90.
                                Brand-new Nike Air cushioning underfoot adds unparalleled
                                comfort while transparent mesh and vibrantly coloured details
                                on the upper are blended with timeless OG features for an
                                edgy, modernised look.
                            </p>


                        </div>
                        <div class="col-lg-4 card shadow p-10 sticky-right" data-aos="zoom-in">
                            <p class="text-center mt-2">Available Ticket</p>
                            <div class="card shadow p-2 mb-4">
                                <p class="mt-2 ml-3 text danger">Presale 1</p>
                                <p class=" ml-3  text-orange" style="margin-top: -15px; color: orange;">Rp. 25000</p>
                            </div>
                            <div class="card shadow p-2 mb-4">
                                <p class="mt-2 ml-3 text danger">Presale 1</p>
                                <p class=" ml-3  text-orange" style="margin-top: -15px; color: orange;">Rp. 25000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-3">
                            <h5>Guest Star</h5>
                            <hr>
                            <div class=" col-12 col-lg-3 mt-3">
                                <p>Artis 1</p>
                            </div>
                            <div class="col-12 col-lg-3 mt-3">
                                <p>Artis 1</p>
                            </div>
                            <div class="col-12 col-lg-3 mt-3">
                                <p>Artis 1</p>
                            </div>

                        </div>

                    </div>
                </div>
        </div>
    </div>
@endsection


</html>
