@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Settings</h3>
              <h6 class="font-weight-normal mb-0">Update Admin <span class="text-primary">Details</span></h6>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
              <form class="forms-sample" action="{{ route('update.admin.details') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Admin Username/ Email</label>
                  <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Admin Type</label>
                  <input class="form-control" value="{{ Auth::guard('admin')->user()->type }}" readonly>
                </div>
                <div class="form-group">
                  <label for="admin_name">Name</label>
                  <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter New Name" name="admin_name" required="">
                </div>
                <div class="form-group">
                  <label for="admin_mobile">Mobile</label>
                  <input type="text" class="form-control" id="admin_mobile" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="15" minlength="9" placeholder="Enter New Mobile Phone" name="admin_mobile" required="">
                </div>
                <div class="form-group">
                  <label for="admin_image">Admin Photo</label>
                  <input type="file" class="form-control" id="admin_image" name="admin_image">
                  @if (!empty(Auth::guard('admin')->user()->image))
                    <a target="_blank" href="{{ asset('store/admin/photo/'.Auth::guard('admin')->user()->image) }}">View Image</a>
                    <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                  @endif
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
             @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer);
                                toast.addEventListener('mouseleave', Swal.resumeTimer);
                            }
                        });

                        Toast.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: '{{ $error }}'
                        });
                    </script>
                @endforeach
            @endif
            @if(Session::has('error_message_update_details'))
              @push('scripts')
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ Session::get('error_message_update_details') }}",
                    showConfirmButton: false,
                    timer: 3000 // milliseconds
                });
                </script>
              @endpush
            @endif

            @if(Session::has('success_message_update_details'))
              @push('scripts')
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: "{{ Session::get('success_message_update_details') }}",
                    showConfirmButton: false,
                    timer: 3000 // milliseconds
                });
                </script>
              @endpush
            @endif
{{-- footer --}}
@include('admin.layout.footer')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var timestampField = document.getElementById('timestamp');
      var currentTimestamp = new Date().toISOString().slice(0, 19).replace('T', ' ');
      timestampField.value = currentTimestamp;
    });
</script>
@endsection
