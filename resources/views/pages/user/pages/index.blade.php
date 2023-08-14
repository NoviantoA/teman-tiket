@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || HOME
@endsection
@push('css')
    <link href="{{ asset('user/style/main.css') }}" rel="stylesheet" />
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
        {{-- Poster Event Carousel --}}
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
                                @foreach ($bannerData as $index => $banner)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ url('store/admin/banner/' . $banner->banner_image) }}" class="d-block img-fluid"
                                            alt="{{ $banner->banner_name }}" style="max-height: 400px; width: 100%; object-fit: cover;" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Poster Event Carousel --}}


        {{-- Ticket Categories --}}
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
        {{-- End Ticket Categories --}}

        {{-- Event Show --}}
        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h5>Trend Events</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <a href="{{ route('user.detailAll') }}" style="text-decoration: none;color:black;">
                            <p>View All</p>
                        </a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($eventShow as $event)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                            <a class="component-products d-block"
                                href="{{ route('user.details', ['id' => Crypt::encryptString($event->event_id)]) }}">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="
                          background-image: url('store/mitra/events/{{ $event->event_poster }}');
                        ">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ $event->event_name }}
                                </div>
                                <p class="text-dark">Mulai Dari <span class="text-primary">Rp.
                                        {{ $event->event_price }}</span></p>
                                <div class="deskripsi-card">
                                    <p><i class="fas fa-calendar me-2" width="32"> </i> 12 Maret 2023</p>
                                    <p><i class="fas fa-map-marker-alt me-2" width="32"> </i>
                                        {{ $event->event_city }}</p>
                                    <p><i class="fas fa-user-alt me-2"> </i>{{ $event->event_location }}</p>
                                </div>
                                <input type="text" name="event_id" value="{{ $event->event_id }}" hidden>
                            </a>

                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        {{-- End Event Show --}}

    </div>
@endsection
