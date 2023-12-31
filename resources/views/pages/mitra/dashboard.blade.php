@extends('pages.mitra.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                            <h6 class="font-weight-normal mb-0">Semoga Eventya Sukses Ya!!!</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-people mt-auto p-0">
                            <img src="{{ asset('user/images/konser.jpg') }}" alt="people">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Jenis Tiket</p>
                                    <p class="fs-30 mb-2">{{ $ticketCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Pembelian Tiket</p>
                                    <p class="fs-30 mb-2">{{ $soldTicketCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Pendapatan</p>
                                    <p class="fs-30 mb-2">{{ $totalRevenue }}</p>
                                    <p>Pendapatan Keseluruhan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Available Withdraw</p>
                                    <p class="fs-30 mb-2">{{ $totalRevenueWithdraw }}</p>
                                    <p>Pendapatan yang bisa di withdraw</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                                data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                                <div class="ml-xl-4 mt-3">
                                                    <p class="card-title">Detailed Penjualan Tiket</p>
                                                    <h1 class="text-primary">{{ $soldTicketCount }}</h1>
                                                    <h3 class="font-weight-500 mb-xl-4 text-primary">Tiket Dijual</h3>
                                                    <p class="mb-2 mb-xl-0">Berikut Merupakan Grafik Penjualan Tiket event
                                                        yang terjual</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <div class="row">
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <table class="table table-borderless report-table">
                                                                @foreach ($soldTickets as $ticket)
                                                                    <tr>
                                                                        <td class="text-muted">{{ $ticket->ticket_name }}</td>
                                                                        <td class="w-100 px-0">
                                                                            <div class="progress progress-md mx-4">
                                                                                @php
                                                                                    $randomColor = ['bg-primary', 'bg-warning', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-dark'];
                                                                                    $randomBgColor = $randomColor[array_rand($randomColor)];
                                                                                @endphp
                                                                                <div class="progress-bar {{ $randomBgColor }}" role="progressbar" style="width: {{ ($ticket->ticket_sold / $ticket->ticket_capacity) * 100 }}%;"
                                                                                    aria-valuenow="{{ ($ticket->ticket_sold / $ticket->ticket_capacity) * 100 }}" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <h5 class="font-weight-bold mb-0">{{ $ticket->ticket_sold }}</h5>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <canvas id="north-america-chart"></canvas>
                                                        <div id="north-america-legend"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Riwayat Withdraw</p>
                            <p>Berikut Merupakan Riwayat Withdraw Anda</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Id Transaksi</th>
                                            <th>Jumlah Penarikan</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php $no=1; ?>
                                            @foreach($withdraws as $data)
                                            <td>{{ $data->withdraw_id }}</td>
                                            <td class="font-weight-bold">Rp {{ $data->nominal }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td class="font-weight-medium">
                                                @if($data->status == 'diajukan')
                                                    <div class="badge badge-info">Diajukan</div>
                                                @elseif($data->status == 'proses')
                                                    <div class="badge badge-warning">Proses</div>
                                                @elseif($data->status == 'sukses')
                                                <div class="badge badge-success">Sukses</div>
                                                @endif
                                            </td>
                                            <td class="font-weight-medium">
                                                <a href="{{ route('withdraw.get') }}">
                                                    <div class="badge badge-dark">Lihat Bukti Transaksi</div>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('pages.mitra.layouts.footer')

    </div>
@endsection