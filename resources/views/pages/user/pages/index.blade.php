@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || HOME
@endsection
@push('css')
    <link href="{{ asset('user/style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/style/styleku.css') }}" rel="stylesheet" />
@endpush
@section('navbar')
    @include('pages.user.layouts.navbar')
@endsection
@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#storeCarousel" data-slide-to="1"></li>
                                <li data-target="#storeCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('user/images/konser.jpg') }}" class="d-block img-fluid"
                                        alt="Carousel Image" style="max-height: 400px; width: 100%; object-fit: cover;" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('user/images/konser.jpg') }}" class="d-block w-100"
                                        alt="Carousel Image" style="max-height: 400px; width: 100%; object-fit: cover;" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('user/images/konser.jpg') }}" class="d-block w-100"
                                        alt="Carousel Image" style="max-height: 400px; width: 100%; object-fit: cover;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="events-home mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h5>Trend Categories</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <p>View All</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <a class="component-categories d-block" href="#">
                            <div class="categories-image">
                                <img src="{{ asset('user/images/1.svg') }}" alt="Gadgets Categories" class="w-100" />
                            </div>
                            <p class="categories-text">
                                Pameran
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-categories d-block" href="#">
                            <div class="categories-image">
                                <img src="{{ asset('user/images/2.svg') }}" alt="Furniture Categories" class="w-100" />
                            </div>
                            <p class="categories-text">
                                Edu Fair
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                        <a class="component-categories d-block" href="#">
                            <div class="categories-image">
                                <img src="{{ asset('user') }}/images/3.svg" alt="Makeup Categories" class="w-100" />
                            </div>
                            <p class="categories-text">
                                Fashion Show
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                        <a class="component-categories d-block" href="#">
                            <div class="categories-image">
                                <img src="{{ asset('user') }}/images/4.svg" alt="Sneaker Categories" class="w-100" />
                            </div>
                            <p class="categories-text">
                                Pertunjukan
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                        <a class="component-categories d-block" href="#">
                            <div class="categories-image">
                                <img src="{{ asset('user') }}/images/5.svg" alt="Tools Categories" class="w-100" />
                            </div>
                            <p class="categories-text">
                                Music
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                        <a class="component-categories d-block" href="#">
                            <div class="categories-image">
                                <img src="{{ asset('user') }}/images/6.svg" alt="Baby Categories" class="w-100" />
                            </div>
                            <p class="categories-text">
                                Seminar
                            </p>
                        </a>
                    </div>
                </div>
            </div>

        </section>
        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h5>Trend Events</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <p>View All</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="
                      background-image: url('  {{ asset('user/images/actionvance-eXVd7gDPO9A-unsplash.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                Surabaya Music
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="fas fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fas fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200" card>
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail ">
                                <div class="products-image"
                                    style="
                      background-image: url('{{ asset('user/images/aditya-chinchure-ZhQCZjr9fHo-unsplash.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                Rungkut Music
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="fas fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fas fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="
                      background-image: url('{{ asset('user/images/anthony-delanoix-hzgs56Ze49s-unsplash.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                FASILKOM FEST
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="fas fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fas fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="
                      background-image: url('{{ asset('user/images/konser.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                Surabaya Fest
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="fas fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fas fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="
                      background-image: url('{{ asset('user/images/nainoa-shizuru-NcdG9mK3PBY-unsplash.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                Veteran Fest
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="fas fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fas fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="
                      background-image: url('{{ asset('user/images/austin-neill-hgO1wFPXl3I-unsplash.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                Cafe Music
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="fas fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fas fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="
                      background-image: url('{{ asset('user/images/nathan-fertig-IW5Bm4rB9OA-unsplash.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                Konser Kenangan
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="fas fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fas fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-products d-block" href="/details.html">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="
                      background-image: url('{{ asset('user/images/danny-howe-bn-D2bCvpik-unsplash.jpg') }}');
                    ">
                                </div>
                            </div>
                            <div class="products-text">
                                Mantan Fest
                            </div>
                            <p class="text-dark">Mulai Dari <span class="text-primary">Rp. 20.000</span></p>
                            <div class="deskripsi-card">
                                <p><i class="far fa-calendar" width="32"> </i> 12 Maret 2023</p>
                                <p><i class="fas fa-map-marker-alt" width="32"> </i> Surabaya</p>
                                <p><i class="fa fa-user-alt"> </i> Surabaya Carnival</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
