@extends('pages.admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">Semangat Cari Cuan, Semoga Sehat Selalu!!</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <h3>Data Website Teman Tiket</h3>
                <div class="row">
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Mitra</p>
                                <p class="fs-30 mb-2">{{ $totalMitra }}</p>
                                <p>Jumlah Mitra Yang Terdaftar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Event</p>
                                <p class="fs-30 mb-2">{{ $totalEvent }}</p>
                                <p>Jumlah event yang dibuat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Jumlah User</p>
                                <p class="fs-30 mb-2">{{ $totalUser }}</p>
                                <p>Jumlah User Teman Tiket</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Transaksi</p>
                                <p class="fs-30 mb-2">{{ $totalTransaksi }}</p>
                                <p>Jumlah Transaksi Pada teman Tiket</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <h3>Data Withdraw</h3>
                <div class="row">
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Total Withdraw</p>
                                <p class="fs-30 mb-2">{{ $totalWithdraw }}</p>
                                <p>Jumlah Mitra Yang Terdaftar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Withdraw Diajukan</p>
                                <p class="fs-30 mb-2">{{ $totalWithdrawDiajukan }}</p>
                                <p>Jumlah keselruhan Withdraw Diajukan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Withdraw Diproses</p>
                                <p class="fs-30 mb-2">{{ $totalWithdrawDiproses }}</p>
                                <p>Jumlah Keseluruhan Withdraw Diproses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Withdraw Sukses</p>
                                <p class="fs-30 mb-2">{{ $totalWithdrawSukses }}</p>
                                <p>Jumlah Keseluruhan withdraw sukses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <h3>Data Keuangan</h3>
                <div class="row">
                    <div class="col-md-6 mb-3 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Total Keuangan</p>
                                <p class="fs-30 mb-2">Rp {{ $totalKeuangan }}</p>
                                <p>Jumlah Mitra Yang Terdaftar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Keuntungan Penjualan Tiket</p>
                                <p class="fs-30 mb-2">Rp {{ $totalKeuntungan }}</p>
                                <p>Jumlah keselruhan Withdraw Diajukan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->
    {{-- @include('admin.layout.footer') --}}
@endsection
@push('script')
@endpush
