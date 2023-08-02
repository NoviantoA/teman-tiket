@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET | Details
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
    <div class="container">
        <div class="page-content page-details">
            <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Event Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-gallery" id="gallery">
                <div class="container">

                    <img src="/store/mitra/events/{{ $event->event_poster }}" width="100%" style="max-height: 400px"
                        alt="Poster Event">


                </div>
            </section>
            <div class="store-details-container mt-4 container" data-aos="fade-up">
                <section class="store-heading">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <h1>{{ $event->event_name }}</h1>
                                <div class="mb-2">By {{ $event->name }}</div>
                                <div class="mb-2" style="color: orange"> <i class="fas fa-map-marker-alt me-2"></i>
                                    {{ $event->event_location }}</div>
                                <div class="mb-2" style="color: orange"><i class="far fa-calendar me-2"></i>
                                    {{ date('d-m-Y', strtotime($event->event_date)) }}</div>
                                <p class="mb-2">
                                    {{ $event->event_description }}
                                </p>
                            </div>
                            @if ($event->event_id == null)
                                <div class="col-lg-4 card shadow p-10 sticky-right" data-aos="zoom-in">
                                    <div class="container">
                                        <h3 class="text-center mt-2 text-danger">Ticket Not Available Yet!</h3>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-4 card shadow p-10 sticky-right" data-aos="zoom-in">



                                    <p class="text-center mt-2">Available Ticket</p>
                                    <div class="card shadow p-2 mb-4">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-7 text-center">
                                                    <p class="mt-2 ml-3 text danger">{{ $event->ticket_name }}</p>
                                                    <p class=" ml-3  text-orange" style="margin-top: -15px; color: orange;">
                                                        Rp.
                                                        {{ $event->event_price }}</p>

                                                </div>
                                                <div class="col-md-5 text-center">
                                                    @if ($event->ticket_capacity - $event->ticket_sold == 0)
                                                        <p class="mt-2 ml-3 text-danger ">Sold Out
                                                            {{ $event->ticket_sold }}
                                                        </p>
                                                    @else
                                                        <p class="mt-2 ml-3">Available
                                                            {{ $event->ticket_capacity }}
                                                        </p>
                                                        <p class=" ml-3  text-orange" style="margin-top: -15px;">Sold
                                                            {{ $event->ticket_sold }} </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($event->ticket_capacity - $event->ticket_sold != 0)
                                        <form action="{{ route('user.details.post') }}" method="POST">
                                            @csrf
                                            <div class="card shadow p-2 mb-4">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="exampleInputName1">Person</label>
                                                            <input type="number" class="form-control" id="ticket_count"
                                                                name="ticket_count" placeholder="Jumlah Tiket"
                                                                style="width:150px;" min="0" max="3">
                                                            <input type="text" name="event_price" id="event_price"
                                                                value="{{ $event->event_price }}" hidden>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <p class="mt-2 ml-3 text danger">Total</p>
                                                            <p class=" ml-3  text-orange"
                                                                style="margin-top: -15px; color: #1670b8;"
                                                                id="total_ticket">Rp
                                                                0
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-success mb-4 p-2" id="ticket_button" type="submit"
                                                style="width:435px;">Get
                                                Ticket!</button>
                                        </form>
                                    @endif
                                </div>
                            @endif

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

    </div>
@endsection

</html>
