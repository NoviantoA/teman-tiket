@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Settings</h3>
                            <h6 class="font-weight-normal mb-0">Update Admin <span class="text-primary">Password</span></h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                        id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h4 class="card-title">Update Admin Password</h4> --}}
                            <form class="forms-sample" action="{{ route('update.admin.password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Admin Username/ Email</label>
                                    <input class="form-control" value="{{ $adminDetails['email'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Admin Type</label>
                                    <input class="form-control" value="{{ $adminDetails['type'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password"
                                        placeholder="Enter Current Password" name="current_password">
                                    <span id="check_password"></span>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password"
                                        placeholder="Enter New Password" name="new_password" required="">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        placeholder="Confirm Password" name="confirm_password" required="">
                                </div>
                                <input type="text" id="timestamp" name="updated_at" class="form-control" hidden>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('error_message_update_password'))
            @push('scripts')
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "{{ Session::get('error_message_update_password') }}",
                        showConfirmButton: false,
                        timer: 3000 // milliseconds
                    });
                </script>
            @endpush
        @endif

        @if (Session::has('success_message_update_password'))
            @push('scripts')
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: "{{ Session::get('success_message_update_password') }}",
                        showConfirmButton: false,
                        timer: 3000 // milliseconds
                    });
                </script>
            @endpush
        @endif
        {{-- footer --}}
        @include('layouts.footer')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var timestampField = document.getElementById('timestamp');
            var currentTimestamp = new Date().toISOString().slice(0, 19).replace('T', ' ');
            timestampField.value = currentTimestamp;
        });
    </script>
@endsection
