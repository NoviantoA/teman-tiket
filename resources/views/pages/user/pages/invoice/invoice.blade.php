@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || Ticket Details
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
                                    Invoice Detail
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section style="width: 1000px; margin:50px 0px 0px 250px">
            <div class="container card shadow p-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-card">
                            <img src="{{ asset('user/images/konser.jpg') }}" class="d-block img-fluid " alt="Carousel Image"
                                style="max-height: 100%; height: 100%; width: 100%; object-fit: cover;" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>Nomor Transaksi</h4>
                            @if ($trans->transaction_is_paid == 0)
                                <div class="btn btn-disabled text-light" style="background-color: yellow;" disabled>Waiting
                                    Payment</div>
                            @endif
                            @if ($trans->transaction_is_paid == 1)
                                <div class="btn btn-disabled text-light" style="background-color: green;" disabled>Success
                                </div>
                            @endif
                            @if ($trans->transaction_is_paid == 2)
                                <div class="btn btn-disabled text-light" style="background-color: red;" disabled>Fail</div>
                            @endif
                        </div>
                        <p>{{ $trans->transaction_id }}</p>
                        <div class="row mt-4">
                            <table class="table table-hover" style="width: 480px; margin:0px 0px 0px 10px">
                                <tr>
                                    <td class="pt-3 ps-4">
                                        <p>Nama Event</p>
                                    </td>
                                    <td class="pt-3 ps-4">
                                        <p>{{ $trans->event_name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3 ps-4">
                                        <p>Tanggal</p>
                                    </td>
                                    <td class="pt-3 ps-4">
                                        <p>{{ $trans->event_date }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3 ps-4">
                                        <p>Lokasi</p>
                                    </td>
                                    <td class="pt-3 ps-4">
                                        <p>{{ $trans->event_location }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3 ps-4">
                                        <p>Penyelenggara</p>
                                    </td>
                                    <td class="pt-3 ps-4">
                                        <p>{{ $trans->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3 ps-4">
                                        <p>Tanggal Bayar</p>

                                    </td>
                                    <td class="pt-3 ps-4">
                                        <p>Tanggal Bayar</p>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3 ps-4">
                                        <p>Status</p>
                                    </td>
                                    <td class="pt-3 ps-4">
                                        @if ($trans->transaction_is_paid == 0)
                                            <div class="btn btn-disabled text-light" style="background-color: yellow;"
                                                disabled>Waiting Payment</div>
                                        @endif
                                        @if ($trans->transaction_is_paid == 1)
                                            <div class="btn btn-disabled text-light" style="background-color: green;"
                                                disabled>Success</div>
                                        @endif
                                        @if ($trans->transaction_is_paid == 2)
                                            <div class="btn btn-disabled text-light" style="background-color: red;"
                                                disabled>Fail</div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="body-details">
                    <div class="mt-4">
                        <h4>Detail Transaksi</h4>
                        <hr style="margin-bottom: 30px;">
                        <div>
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Transactions</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $trans->ticket_name }}</td>
                                        <td>{{ $trans->transaction_ticket_count }}</td>
                                        <td>Rp. {{ $trans->transaction_ticket_count * $trans->event_price }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>PPN 11%</td>
                                        <td>-</td>
                                        <td>Rp. {{ $trans->transaction_ppn }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>App Service</td>
                                        <td>{{ $trans->transaction_ticket_count }}</td>
                                        <td>Rp. 1000</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td colspan="3" class="table-active">Total Bayar </td>
                                        <td>Rp. {{ $trans->transaction_total }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>Ticket Users</h4>
                        <hr style="margin-bottom: 30px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Email</td>
                                    <td>Name</td>
                                    <td>Phone</td>
                                    <td>Gender</td>
                                    <td>Address</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($ticket_users as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->ticket_user_email }}</td>
                                        <td>{{ $item->ticket_user_name }}</td>
                                        <td>{{ $item->ticket_user_phone }}</td>
                                        <td>{{ $item->ticket_user_gender }}</td>
                                        <td>{{ $item->ticket_user_address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

</html>
