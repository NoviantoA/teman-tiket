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
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="store/mitra/events/{{ $carousel[0]->event_poster }}"
                                        class="d-block w-100 img-fluid"
                                        style="max-height: 400px; width: 100%; object-fit: cover;">

                                </div>
                                <div class="carousel-item">
                                    <img src="store/mitra/events/{{ $carousel[1]->event_poster }}" class="d-block w-100"
                                        style="max-height: 400px; width: 100%; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="store/mitra/events/{{ $carousel[2]->event_poster }}" class="d-block w-100"
                                        style="max-height: 400px; width: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
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
                        <div class="col-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                            <a class="component-products"
                                href="{{ route('user.details', ['id' => Crypt::encryptString($event->event_id)]) }}">
                                <div class="products-thumbnail mb-3">
                                    <div class="products-image"
                                        style="
                          background-image: url('store/mitra/events/{{ $event->event_poster }}');
                        ">
                                    </div>

                                </div>
                                <span class="products-text">{{ $event->event_name }}
                                    <a href="{{ route('user.wishlists.change', ['id' => !empty($event->wishlist_id) ? $event->wishlist_id : 0, 'event_id' => $event->event_id]) }}"
                                        style="margin-left:120px;" role="button"><i
                                            class="bi {{ $event->wishlist == true ? 'bi-heart-fill' : 'bi-heart' }}"></i></a>
                                </span>
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
