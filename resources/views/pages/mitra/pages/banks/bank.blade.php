@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Css Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- End CSS Bootstrap --}}

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- End Bootstrap Icon --}}

    <style>
        .bank-card {
            --primary-clr: #1C204B;
            --dot-clr: #BBC0FF;
            --play: hsl(195, 74%, 62%);
            width: 500px;
            height: 370px;
            border-radius: 10px;
        }

        .bank-card {
            font-family: "Arial";
            color: #fff;
            display: grid;
            cursor: pointer;
            grid-template-rows: 50px 1fr;
        }

        .bank-card-desc {
            border-radius: 10px;
            padding: 15px;
            position: relative;
            top: -10px;
            display: grid;
            gap: 10px;
            background: var(--primary-clr);
        }

        .bank-card-time {
            font-size: 1.7em;
            font-weight: 500;
        }

        .bank-card-header {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .bank-card-title {
            flex: 1;
            font-size: 30px;
            font-weight: 500;
        }

        .bank-card-menu {
            display: flex;
            gap: 4px;
            margin-inline: auto;
        }

        .bank-card svg {
            float: right;
            max-width: 100%;
            max-height: 100%;
        }

        .bank-card .dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--dot-clr);
        }

        .bank-card .recent {
            line-height: 0;
            font-size: 0.8em;
        }
    </style>
@endpush
@extends('pages.mitra.layouts.app')
@section('content')
    <div class="main-panel mt-5">
        <div class="row container">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">Thank You for being Mitra's Teman Tiket</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Create Bank Account --}}
        @if ($bank == null)
            <div class="row container mb-3">
                <div class="col-md-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModalBank">Add Bank
                        Information</button>
                </div>
            </div>

            {{-- Modal Create Bank Account --}}
            <div class="modal fade" id="createModalBank" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <form class="forms-sample" action="{!! route('bank.post') !!}" method="POST">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Bank Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Jenis Bank</label>
                                    <select class="form-control" name="jenis_bank" id="bank_name_select">
                                        <option value="" selected disabled> -- Pilih Jenis Bank -- </option>
                                        <option value="Bank">Bank</option>
                                        <option value="E - Wallet">E - Wallet</option>
                                    </select>
                                </div>
                                <div class="form-group" id="nama_bank">
                                    <label for="exampleInputName1">Nama Bank</label>
                                    <input type="text" class="form-control" id="rekening" placeholder="Nama Bank"
                                        name="nama_bank">
                                </div>
                                <div class="form-group" id="nama_wallet">
                                    <label for="exampleInputName1">Nama E - Wallet</label>
                                    <input type="text" class="form-control" id="rekening" placeholder="Nama E - Wallet"
                                        name="nama_wallet">
                                </div>
                                <div class="form-group" id="nomer_rekening">
                                    <label for="exampleInputName1">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="rekening" placeholder="Rekening"
                                        name="nomer_rekening">
                                </div>
                                <div class="form-group" id="nomer_hp">
                                    <label for="exampleInputName1">Nomor HP Terdaftar</label>
                                    <input type="text" class="form-control" id="rekening" placeholder="Nomer hp"
                                        name="nomer_hp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLocation">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="pemilik" placeholder="Pemilik"
                                        name="nama_pemilik">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- End Modal Create Bank Account --}}
        @endif
        {{-- Create Bank Account --}}

        <div class="row container">
            <div class="col-12 grid-margin stretch-card">
                {{-- Bank Information --}}
                @if ($bank == null)
                    <div class="alert alert-danger" style="margin:20px 0px 0px 0px">
                        You haven't added a bank account.
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Your Bank Information</h4>
                            <div class="bank-card work" style="margin-top:-40px;">
                                <div class="img-section">
                                </div>
                                <div class="bank-card-desc">
                                    <div class="bank-card-header container">
                                        <div class="bank-card-title">{{ $bank->bank_name }}</div>
                                        <div class="bank-card-menu">
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                        </div>
                                    </div>
                                    @if ($bank->bank_nomer_rekening == null)
                                        <div class="bank-card-time container">{{ $bank->bank_nomer_hp }}</div>
                                    @else
                                        <div class="bank-card-time container">{{ $bank->bank_nomer_rekening }}</div>
                                    @endif

                                    <p class="recent container">{{ $bank->bank_name_user }}</p>

                                    @if ($bank->bank_is_verified)
                                        <span class="btn btn-success"
                                            style="width: 200px; margin-left:20px; padding:10px 0px 5px 0px ">
                                            <i class="bi bi-patch-check"></i>
                                            Verified by Admin
                                        </span>
                                    @else
                                        <span class="btn btn-warning"
                                            style="width: 200px; margin-left:20px; padding:10px 0px 5px 0px ">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                            Waiting Admin
                                        </span>
                                    @endif

                                    <div class="card-footer">
                                        <div class="row pt-4">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <p class="recent">Dibuat pada
                                                        {{ date('d-m-Y', strtotime($bank->created_at)) }}</p>
                                                </div>
                                                <div class="row pt-3">
                                                    <p class="recent">Terakhir diubah
                                                        {{ date('d-m-Y', strtotime($bank->updated_at)) }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                    data-bs-target="#updateBankModal"><i
                                                        class="bi bi-pencil-square pe-1"></i>Update</button>
                                                <button class="btn btn-danger ms-1" data-bs-toggle="modal"
                                                    data-bs-target="#deleteBankModal"><i
                                                        class="bi bi-trash3 pe-1"></i>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Update Modal Bank Account --}}
                    <div class="modal fade" id="updateBankModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <form class="forms-sample" action="{{ route('bank.update', ['id' => $bank->bank_id]) }}"
                            method="POST">
                            @method('put')
                            @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Bank Informations</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Jenis Bank</label>
                                            <select class="form-control" name="jenis_bank_update" id="bank_name_select"
                                                disabled>
                                                <option value="{{ $bank->bank_type }}" selected hidden>
                                                    {{ $bank->bank_type }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="nama_bank_update"
                                            {{ $bank->bank_type == 'E - Wallet' ? 'hidden' : '' }}>
                                            <label for="exampleInputName1">Nama Bank</label>
                                            <input type="text" class="form-control" id="nama_bank_update"
                                                placeholder="Nama Bank" name="nama_bank" value="{{ $bank->bank_name }}">
                                        </div>
                                        <div class="form-group" id="nama_wallet_update"
                                            {{ $bank->bank_type == 'E - Wallet' ? '' : 'hidden' }}>
                                            <label for="exampleInputName1">Nama E - Wallet</label>
                                            <input type="text" class="form-control" id="rekening"
                                                placeholder="Nama E - Wallet" name="nama_wallet"
                                                value="{{ $bank->bank_name }}">
                                        </div>
                                        <div class="form-group" id="nomer_rekening_update"
                                            {{ $bank->bank_type == 'E - Wallet' ? 'hidden' : '' }}>
                                            <label for="exampleInputName1">Nomor Rekening</label>
                                            <input type="text" class="form-control" id="rekening"
                                                placeholder="Rekening" name="nomer_rekening"
                                                value="{{ $bank->bank_nomer_rekening }}">
                                        </div>
                                        <div class="form-group" id="nomer_hp_update"
                                            {{ $bank->bank_type == 'E - Wallet' ? '' : 'hidden' }}>
                                            <label for="exampleInputName1">Nomor HP Terdaftar</label>
                                            <input type="text" class="form-control" id="rekening"
                                                placeholder="Nomer hp" name="nomer_hp"
                                                value="{{ $bank->bank_nomer_hp }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputLocation">Nama Pemilik</label>
                                            <input type="text" class="form-control" id="pemilik"
                                                placeholder="Pemilik" name="nama_pemilik"
                                                value="{{ $bank->bank_name_user }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- End Update Modal Bank Account --}}

                    {{-- Delete Bank Information --}}
                    <div class="modal fade" id="deleteBankModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <form class="forms-sample" action="{{ route('bank.delete', ['id' => $bank->bank_id]) }}"
                            method="POST">
                            @method('delete')
                            @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-danger" id="exampleModalLabel">Are You
                                            Sure to Delete ?</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($bank->bank_type == 'E - Wallet')
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Nomer HP</label>
                                                <input type="text" class="form-control" id="pemilik"
                                                    placeholder="Pemilik" name="nama_pemilik"
                                                    value="{{ $bank->bank_nomer_hp }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLocation">Nama Pemilik</label>
                                                <input type="text" class="form-control" id="pemilik"
                                                    placeholder="Pemilik" name="nama_pemilik"
                                                    value="{{ $bank->bank_name_user }}"disabled>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Nomer Rekening</label>
                                                <input type="text" class="form-control" id="pemilik"
                                                    placeholder="Pemilik" name="nama_pemilik"
                                                    value="{{ $bank->bank_nomer_rekening }}"disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLocation">Nama Pemilik</label>
                                                <input type="text" class="form-control" id="pemilik"
                                                    placeholder="Pemilik" name="nama_pemilik"
                                                    value="{{ $bank->bank_name_user }}" disabled>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- EndDelete Bank Information --}}
                @endif
                {{-- End Bank Information --}}


            </div>

        </div>

        @include('pages.mitra.layouts.footer')
        @push('scripts')
            {{-- Bootstrap JS --}}
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>
            {{-- End Bootstrap JS --}}

            {{-- select2 js --}}
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            {{-- end select2 js --}}


            {{-- Error Handler from controller --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{ $error }}',
                        })
                    </script>
                @endforeach
            @endif

            @if ($message = Session::get('create_bank_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
            @if ($message = Session::get('update_bank_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
            @if ($message = Session::get('delete_bank_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
            {{-- End Error Handler from controller --}}

            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();

                    $("#nomer_hp").hide();
                    $("#nama_wallet").hide();

                    $("#bank_name_select").on("change", function() {
                        const value = $("#bank_name_select option:selected").text();
                        if (value == "E - Wallet") {
                            $("#nomer_rekening").hide();
                            $("#nama_bank").hide();
                            $("#nama_wallet").show();
                            $("#nomer_hp").show();
                        } else {
                            $("#nomer_rekening").show();
                            $("#nama_bank").show();
                            $("#nama_wallet").hide();
                            $("#nomer_hp").hide();

                        }
                    })

                    $("#bank_name_select_update").on("change", function() {
                        const value = $("#bank_name_select_update option:selected").text();
                        alert(value);
                        if (value == "E - Wallet") {
                            $("#nomer_rekening_update").hide();
                            $("#nama_bank_update").hide();
                            $("#nama_wallet_update").show();
                            $("#nomer_hp_update").show();
                        } else {
                            $("#nomer_rekening_update").show();
                            $("#nama_bank_update").show();
                            $("#nama_wallet_update").hide();
                            $("#nomer_hp_update").hide();

                        }
                    })
                });
            </script>
        @endpush
    </div>
@endsection
