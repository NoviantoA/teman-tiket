@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || History
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
        <div class="page-content page-home">
            <div class="container">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                    style="text-align:center; margin:50px; padding-left:100px; ">
                    <li class="nav-item ms-5" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">All
                            Transaction</button>
                    </li>
                    <li class="nav-item ms-5" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Succes
                            Transaction</button>
                    </li>
                    <li class="nav-item ms-5" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Pending
                            Transaction</button>
                    </li>
                    <li class="nav-item ms-5" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-failed"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Failed
                            Transaction</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <!-- //iki copyn -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        style="width:1300px; margin-left:50px; margin-top:50px;" aria-labelledby="pills-home-tab">
                        @foreach ($trans as $val)
                            <div class="card  mt-2 mb-2">
                                <div class="row p-3 d-flex align-items-center justify-content-between">
                                    <div class="col text-center">
                                        <p class="mb-0">{{ $val->event_name }}</p>
                                    </div>
                                    <div class="col text-center">
                                        <p class="mb-0">Rp. {{ $val->transaction_total }}</p>
                                    </div>
                                    <div class="col text-center">
                                        @if ($val->transaction_is_paid == 1)
                                            <p class="btn mb-0" style="background-color: forestgreen">Success</p>
                                        @endif
                                        @if ($val->transaction_is_paid == 0)
                                            <p class="btn mb-0" style="background-color:yellow">Waiting Payment</p>
                                        @endif
                                        @if ($val->transaction_is_paid == 2)
                                            <p class="btn mb-0" style="background-color:red">Failed</p>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        <a href="{{ route('index.invoice', ['id' => Crypt::encryptString($val->transaction_id)]) }}) }}"
                                            class="btn btn-sm btn-success mb-0" style="text-decoration: none;">View
                                            Invoice</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        @if (count($success_trans) == 0)
                            <div class="row p-3 d-flex align-items-center justify-content-between">
                                <div class="text-center">
                                    <p class="mb-0">No <span style="color:forestgreen">Success</span> transactions
                                        yet
                                    </p>
                                </div>
                            </div>
                        @else
                            @foreach ($success_trans as $val)
                                <div class="card  mt-2 mb-2">
                                    <div class="row p-3 d-flex align-items-center justify-content-between">
                                        <div class="col text-center">
                                            <p class="mb-0">{{ $val->event_name }}</p>
                                        </div>
                                        <div class="col text-center">
                                            <p class="mb-0">Rp. {{ $val->transaction_total }}</p>
                                        </div>
                                        <div class="col text-center">
                                            <p class="btn mb-0" style="background-color: forestgreen">Success</p>
                                        </div>
                                        <div class="col text-center">
                                            <a href="{{ route('index.invoice', ['id' => Crypt::encryptString($val->transaction_id)]) }}) }}"
                                                class="btn btn-sm btn-success mb-0" style="text-decoration: none;">View
                                                Invoice</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        @if (count($pending_trans) == 0)
                            <div class="row p-3 d-flex align-items-center justify-content-between">
                                <div class="text-center">
                                    <p class="mb-0">No <span style="color:yellow">Waiting Payment</span> transactions
                                        yet
                                    </p>
                                </div>
                            </div>
                        @else
                            @foreach ($pending_trans as $val)
                                <div class="card  mt-2 mb-2">
                                    <div class="row p-3 d-flex align-items-center justify-content-between">
                                        <div class="col text-center">
                                            <p class="mb-0">{{ $val->event_name }}</p>
                                        </div>
                                        <div class="col text-center">
                                            <p class="mb-0">Rp. {{ $val->transaction_total }}</p>
                                        </div>
                                        <div class="col text-center">
                                            <p class="btn mb-0" style="background-color: yellow">Waiting Payment</p>
                                        </div>
                                        <div class="col text-center">
                                            <a href="{{ route('index.invoice', ['id' => Crypt::encryptString($val->transaction_id)]) }}) }}"
                                                class="btn btn-sm btn-success mb-0" style="text-decoration: none;">View
                                                Invoice</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                    <div class="tab-pane fade" id="pills-failed" role="tabpanel" aria-labelledby="pills-contact-tab">

                        @if (count($fail_trans) == 0)
                            <div class="row p-3 d-flex align-items-center justify-content-between">
                                <div class="text-center">
                                    <p class="mb-0">No <span style="color:red">Failed</span> transactions yet
                                    </p>
                                </div>
                            </div>
                        @else
                            @foreach ($fail_trans as $val)
                                <div class="card  mt-2 mb-2">
                                    <div class="row p-3 d-flex align-items-center justify-content-between">
                                        <div class="col text-center">
                                            <p class="mb-0">{{ $val->event_name }}</p>
                                        </div>
                                        <div class="col text-center">
                                            <p class="mb-0">Rp. {{ $val->transaction_total }}</p>
                                        </div>
                                        <div class="col text-center">

                                        </div>
                                        <div class="col text-center">
                                            <a href="{{ route('index.invoice', ['id' => Crypt::encryptString($val->transaction_id)]) }}) }}"
                                                class="btn btn-sm btn-success mb-0" style="text-decoration: none;">View
                                                Invoice</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


</html>
