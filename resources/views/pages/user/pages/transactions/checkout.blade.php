@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || Checkout
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
                        {{-- Event Details --}}
                        <div class="card ">
                            <div class="detail-header text-center p-3">
                                <h3 class="">Event Detail</h3>
                                <hr>
                            </div>
                            <div class="detail-body justify-content-center p-3">
                                <img src="/store/mitra/events/{{ $ticket->event_poster }}" style="margin-top: -30px;"
                                    width="100%" height="200px" alt="Event Poster">
                                <h3 class="my-4">{{ $ticket->event_name }}</h3>
                                <div class="owner" style="margin-top: -10px;">By {{ $ticket->name }}</div>
                                <div class="owner mt-2"> <i class="fas fa-map-marker-alt me-2"></i>
                                    {{ $ticket->event_location }}
                                </div>
                                <div class="owner mt-2"><i class="far fa-calendar me-2"></i>
                                    {{ date('d-m-Y', strtotime($ticket->event_date)) }}</div>
                            </div>
                        </div>
                        {{-- End Event Details --}}
                    </div>
                    <div class="col-lg-8 col-12">
                        {{-- Stepper --}}
                        <section class="card p-3 shadow">
                            <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                                <li class="nav-item me-4" style="margin-left:35px;" role="presentation">
                                    <button class="nav-link px-5 active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Step 1</button>
                                </li>
                                <li class="nav-item me-4" style="margin-left:35px;" role="presentation">
                                    <button class="nav-link px-5" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Step 2</button>
                                </li>
                                <li class="nav-item me-4" style="margin-left:35px;" role="presentation">
                                    <button class="nav-link px-5" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">
                                        Step 3</button>
                                </li>
                                <li class="nav-item me-4" style="margin-left:35px;" role="presentation">
                                    <button class="nav-link px-5" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-failed" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">
                                        Step 4</button>
                                </li>
                            </ul>
                        </section>
                        {{-- End Stepper --}}

                        {{-- Stepper Tab-content --}}
                        <form action="{{ route('user.checkoutHandler') }}"class="tab-content pb-5 mt-4"
                            style="margin-top:-25px;" id="pills-tabContent" method="POST">
                            @csrf
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                {{-- Ticket Users --}}
                                <section class="mt-4 p-3 card shadow">
                                    <h4 class="text-center">Registration ticket</h4>
                                    <hr>
                                    <div class="form-regist-ticket"
                                        style="width: 900px;max-height: 300px;overflow-y:scroll;overflow-x:hidden">

                                        @for ($i = 0; $i < $data_transactions['ticket_count']; $i++)
                                            <div class="form-row d-flex justify-content-between">
                                                <button class="btn mb-3 fw-bold" disabled style="color: black;">Ticket
                                                    User
                                                    {{ $i + 1 }}</button>
                                                <div class="form-check form-check-inline ml-auto">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="check_user_{{ $i + 1 }}" role="button">
                                                    <label class="form-check-label" for="inlineCheckbox2">As
                                                        {{ Auth::user()->name }}'s
                                                        Data</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="input_email_{{ $i + 1 }}">Email
                                                                address <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="input_email_{{ $i + 1 }}"
                                                                name="input_email_{{ $i + 1 }}"
                                                                aria-describedby="emailHelp" placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="input_name_{{ $i + 1 }}">Name<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="input_name_{{ $i + 1 }}"
                                                                name="input_name_{{ $i + 1 }}" placeholder="name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="input_phone_{{ $i + 1 }}">Phone<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="input_phone_{{ $i + 1 }}"
                                                                name="input_phone_{{ $i + 1 }}"
                                                                placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="input_date_{{ $i + 1 }}">Tanggal
                                                                Lahir<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control"
                                                                id="input_date_{{ $i + 1 }}"
                                                                name="input_date_{{ $i + 1 }}"
                                                                placeholder="Enter Born Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="input_gender_{{ $i + 1 }}">Gender<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select select2"
                                                        aria-label="Default select example"
                                                        id="input_gender_{{ $i + 1 }}"
                                                        name="input_gender_{{ $i + 1 }}">
                                                        <option class="text-muted" hidden selected value="">---
                                                            Gender ----
                                                        </option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="input_address_{{ $i + 1 }}">Address<span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="input_address_{{ $i + 1 }}" id="input_address_{{ $i + 1 }}" cols="20"
                                                        class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <hr />
                                        @endfor

                                    </div>
                                </section>
                                {{-- Ticket Users --}}
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                {{-- Ticket Details --}}
                                <section class="mt-4 p-3 card shadow">
                                    <h4 class="text-center">Ticket Details</h4>
                                    <hr>
                                    <div class="container">
                                        <div class="d-flex justify-content-between">
                                            <div class="me-auto">
                                                <p class="text-muted">Ticket Price</p>
                                                <p>Rp. {{ $ticket->event_price }}</p>
                                            </div>
                                            <div class="mx-auto">
                                                <p class="text-muted">Tiket Total</p>
                                                @if ($data_transactions['ticket_count'] == 1)
                                                    <p>{{ $data_transactions['ticket_count'] }} Ticket</p>
                                                @else
                                                    <p>{{ $data_transactions['ticket_count'] }} Tickets</p>
                                                @endif

                                            </div>
                                            <div class="mx-auto">
                                                <p class="text-muted">Total</p>
                                                <p>Rp. {{ $data_transactions['ticket_count'] * $ticket->event_price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                {{-- End Ticket Details --}}
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                {{-- Voucher --}}
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
                                {{-- End Voucher --}}
                            </div>
                            <div class="tab-pane fade" id="pills-failed" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                {{-- Payment Details --}}
                                <section class="mt-4 p-3 card shadow">
                                    <h4 class="text-center">Payment Details</h4>
                                    <hr>
                                    <div class="container">
                                        <div class="d-flex justify-content-between">
                                            <div class="me-auto">
                                                <p class="text-muted">Ticket Price</p>
                                                <p>Rp. {{ $ticket->event_price }}</p>
                                            </div>
                                            <div class="mx-auto">
                                                <p class="text-muted">Ticket Total</p>
                                                @if ($data_transactions['ticket_count'] == 1)
                                                    <p>{{ $data_transactions['ticket_count'] }} Ticket</p>
                                                    <input type="text" class="form-control" name="ticket_count"
                                                        value={{ $data_transactions['ticket_count'] }} hidden>
                                                @else
                                                    <p>{{ $data_transactions['ticket_count'] }} Tickets</p>
                                                    <input type="text" class="form-control" name="ticket_count"
                                                        value={{ $data_transactions['ticket_count'] }} hidden>
                                                @endif

                                            </div>
                                            <div class="mx-auto">
                                                <p class="text-muted">Total</p>
                                                <p>Rp. {{ $data_transactions['ticket_count'] * $ticket->event_price }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="container">
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">PPN 11%</p>
                                            <p style="margin-right:120px;">Rp.
                                                {{ $data_transactions['ticket_count'] * $ticket->event_price * 0.11 }}
                                            </p>
                                            <input type="text" class="form-control" name="ppn_tax"
                                                value={{ $data_transactions['ticket_count'] * $ticket->event_price * 0.11 }}
                                                hidden>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">Apps Service</p>
                                            <p style="margin-right:120px;">Rp.
                                                {{ $data_transactions['ticket_count'] * 1000 }}</p>
                                            <input type="text" class="form-control" name="app_service"
                                                value={{ $data_transactions['ticket_count'] * 1000 }} hidden>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="container">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="text-muted">Total Payment</h5>
                                            <p style="margin-right:120px; color:#1670b8;">
                                                Rp.
                                                {{ $data_transactions['ticket_count'] * $ticket->event_price + $data_transactions['ticket_count'] * $ticket->event_price * 0.11 + 1000 }}
                                            </p>
                                            <input type="text" class="form-control" name="total_payment"
                                                value={{ $data_transactions['ticket_count'] * $ticket->event_price + $data_transactions['ticket_count'] * $ticket->event_price * 0.11 + 1000 }}
                                                hidden>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="event_id" name="event_id"
                                        placeholder="Event" value={{ $data_transactions['event_id'] }} hidden>
                                    <input type="text" class="form-control" id="ticket_id" name="ticket_id"
                                        placeholder="Event" value={{ $data_transactions['ticket_id'] }} hidden>
                                    <button class="btn" type="submit">Checkout Now!</button>

                                </section>
                                {{-- End Payment Details --}}
                            </div>
                        </form>
                        {{-- End Stepper Tab-content --}}


                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection


</html>
