@extends('pages.user.layouts.app')

@section('title')
    TEMAN TIKET || Payment
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
                                    Invoice
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container card shadow p-3">

                <div class="body-details mt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5>Nama Pembeli</h5>
                            <p style="max-width: 450px">Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo
                                edmodo ifttt zimbra.</p>
                        </div>
                        <div>
                            <p><span class="text-warning">Order Date :</span> tanggal Order</p>
                            <p><span class="text-warning">Status :</span> tanggal Order</p>
                            <p><span class="text-warning">Transaction Id :</span> tanggal Order</p>
                        </div>
                    </div>
                    <div>
                        <h4>Detail Transaksi</h4>
                        <hr style="margin-top: -5px;">
                        <div>
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Tiket</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>2</td>
                                        <td>Rp. 20000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>2</td>
                                        <td>Rp. 20000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="table-active">Total Bayar </td>
                                        <td>Rp. 40000</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

</html>
