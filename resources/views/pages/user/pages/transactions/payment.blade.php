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
                                    Payment Informations
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        {{-- Payment Method --}}
        <section class="mt-4 p-3 card shadow" style="width:700px; margin:0px 0px 0px 400px;">
            <h4 class="text-center">Payment Method</h4>
            <hr>
            <div class="form-regist-ticket d-flex justify-content-between pl-4 pr-4">
                <button class="btn" style="background-color: silver;">Bank
                    Transfer</button>
                <button class="btn" style="background-color: silver;">E-Wallet</button>
                <button class="btn" style="background-color: silver;">Q-Ris</button>
            </div>
        </section>
        {{-- End Payment Method --}}
    </div>
@endsection

</html>
