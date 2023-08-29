@extends('pages.user.layouts.app')
@section('title')
    TEMAN TIKET || User Setting
@endsection
@push('css')
    <link href="{{ asset('user/style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/style/styleku.css') }}" rel="stylesheet" />

    <style>
        .setting-card {
            width: 400px;
            height: 480px;
            background: #1670b8;
            border-radius: 12px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.123);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            transition-duration: .5s;
        }

        .setting-profileImage {
            margin-top: 20px;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            box-shadow: 5px 10px 20px rgba(0, 0, 0, 0.329);
        }

        .setting-textContainer {
            width: 100%;
            text-align: left;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .setting-name {
            font-size: 1.5em;
            font-weight: 600;
            text-align: center;
            color: white;
            letter-spacing: 0.5px;
        }

        .setting-profile {
            font-size: 1.84em;
            color: rgb(194, 194, 194);
            letter-spacing: 0.2px;
        }

        .setting-card:hover {
            background-color: #f69050;
            transition-duration: .5s;
        }
    </style>
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
        <!--start user setting-->
        <section class="py-4">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="setting-card">
                                    <div class="setting-profileImage">
                                        <img src="{{ Auth::user()->img_profile == '' ? asset('user/images/icon-user.png') : 'store/user/profile/' . Auth::user()->img_profile }}"
                                            alt="profile picture" height="200" width="200px"
                                            class="rounded-circle profile-picture">
                                    </div>
                                    <div class="setting-textContainer mt-5">
                                        <button class="btn btn-primary" style="width:200px;height:50px; margin-left:80px;"
                                            data-bs-toggle="modal" data-bs-target="#changeProfile"><i
                                                class="bi bi-pencil-square me-2"></i>Change Profile</button>
                                        <hr />
                                        <p class="setting-name">{{ Auth::user()->email }}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0 border">
                                    <div class="card-body">
                                        <form class="row g-3" method="post" action="{{ route('update.info.setting') }}">
                                            @method('put')
                                            @csrf

                                            <div class="col-md-6">
                                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                                <input type="text" name="user_name" class="form-control"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Phone<span class="text-danger">*</span></label>
                                                <input type="text" name="user_phone" class="form-control"
                                                    value="{{ Auth::user()->no_telp }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Birth Date<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="user_bdate" class="form-control"
                                                    value="{{ substr(Auth::user()->born_date, 0, 10) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Gender<span class="text-danger">*</span></label>
                                                <select class="form-select select2" aria-label="Default select example"
                                                    name="user_gender">
                                                    <option class="text-muted" hidden selected>
                                                        {{ Auth::user()->gender }}
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                                <textarea name="user_address" class="form-control" id="" cols="30" rows="10">{{ Auth::user()->address }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-dark">Save
                                                    Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Change Profile Modal --}}
            <div class="modal fade" id="changeProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('update.acc.setting') }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body row container my-3">
                                <div class="mt-1">
                                    <label for="formFile" class="form-label">Upload Profile</label>
                                    <input class="form-control" type="file" id="formFile" name="user_img">
                                </div>

                                {{-- <div class="col-12 mt-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" name="user_current_password" class="form-control">
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="user_new_password" class="form-control">
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" name="user_confirm_password" class="form-control">
                                </div> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn">Save changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{-- End Change Profile Modal --}}

        </section>
        <!--end user setting-->
    </div>
@endsection
