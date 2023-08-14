@extends('pages.admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit User</h4>
                        {{-- <p class="card-description">
                            Biar Enak
                        </p> --}}
                        <form action="{{ route('admin.edit.user', ['id' => $user->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama User</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="rekening" placeholder="Masukan Nama User">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nomor Telephon</label>
                                <input type="text" class="form-control" name="no_telp" value="{{ $user->no_telp }}" id="rekening" value="+62" placeholder="Masukan Nomor Telephon">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Gmail</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" id="rekening" placeholder="Masukan Nama Gmail">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password</label>
                                <input type="password" class="form-control" value="{{ $user->password }}" name="password" id="rekening" placeholder="*******">
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
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
