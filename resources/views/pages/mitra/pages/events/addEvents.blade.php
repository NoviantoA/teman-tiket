@push('css')
    {{-- <link rel="stylesheet" href="{{ url('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            font-size: 18px;
            padding-top: 4px;
            padding-bottom: 4px;
        }


        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
@endpush
@extends('pages.mitra.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Events</h4>
                            <p class="card-description">
                                Ayo Buat Events Anda!!
                            </p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name Event</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLocation">Lokasi Events</label>
                                    <input type="text" class="form-control" id="location" placeholder="location">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Event</label>
                                    <input class="form-control" type="date" id="dateEvents" />
                                </div>
                                {{-- optional  --}}
                                <div class="form-group">
                                    <label>Guest Star</label>
                                    <select class="js-example-basic-multiple w-100" multiple="multiple">
                                        <option value="AL">Peterpan</option>
                                        <option value="WY">Noah</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity1">City</label>
                                    <input type="text" class="form-control" id="exampleInputCity1"
                                        placeholder="Location">
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                {{-- optional  --}}


                                <div class="form-group">
                                    <label for="exampleTextarea1">Deskripsi Events</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="js-example-basic-multiple w-100" multiple="multiple">
                                        <option value="AL">Konser</option>
                                        <option value="WY">Music</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('pages.mitra.layouts.footer')
        @push('scripts')
            {{-- <script src="{{ url('admin/vendors/select2/select2.min.js') }}"></script>
            <script src="{{ url('admin/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script> --}}
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });
            </script>


            {{-- <script src="{{ url('admin/vendors/js/typeahead.js') }}"></script> --}}

            {{-- <script src="{{ url('admin/js/select2.js') }}"></script> --}}
        @endpush

    </div>
@endsection
