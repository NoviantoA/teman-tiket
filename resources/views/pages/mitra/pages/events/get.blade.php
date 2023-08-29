@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Css Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- End CSS Bootstrap --}}

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

        .card {
            position: relative;
            width: 350px;
            aspect-ratio: 16/9;
            background-color: #f2f2f2;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            perspective: 1000px;
            box-shadow: 0 0 0 5px #ffffff80;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card svg {
            width: 48px;
            fill: #333;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card__image {
            width: 100%;
            height: 100%;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
        }

        .card__content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            background-color: #f2f2f2;
            transform: rotateX(-90deg);
            transform-origin: bottom;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card:hover .card__content {
            transform: rotateX(0deg);
        }

        .card__title {
            margin: 0;
            font-size: 20px;
            color: #333;
            font-weight: 700;
        }

        .card:hover svg {
            scale: 0;
        }

        .card__description {
            margin: 10px 0 10px;
            font-size: 12px;
            color: #777;
            line-height: 1.4;
        }

        .card__button {
            padding: 15px;
            border-radius: 8px;
            background: #777;
            border: none;
            color: white;
        }

        .secondary {
            background: transparent;
            color: #777;
            border: 1px solid #777;
        }

        .input {
            width: 450px;
            height: 44px;
            background-color: #05060f0a;
            border-radius: .5rem;
            padding: 0 1rem;
            border: 2px solid transparent;
            font-size: 1rem;
            transition: border-color .3s cubic-bezier(.25, .01, .25, 1) 0s, color .3s cubic-bezier(.25, .01, .25, 1) 0s, background .2s cubic-bezier(.25, .01, .25, 1) 0s;
        }

        .label {
            display: block;
            margin-bottom: .3rem;
            font-size: .9rem;
            font-weight: bold;
            color: #05060f99;
            transition: color .3s cubic-bezier(.25, .01, .25, 1) 0s;
        }

        .input:hover,
        .input:focus,
        .own-input-group:hover .input {
            outline: none;
            border-color: #05060f;
        }

        .own-input-group:hover .label,
        .input:focus {
            color: #05060fc2;
        }


        .card__button__group {
            padding-top: 0px
        }

        .bold-50 {
            font-weight: 500
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

        {{-- CRUD Events --}}
        <div class="container">
            {{-- Create --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEvent">New
                        Event</button>
                </div>
            </div>


            {{-- Create Modal --}}
            <div class="modal fade" id="createEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="createEventForm" class="forms-sample" method="post" enctype="multipart/form-data"
                                action="{!! route('events.post') !!}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Name Event</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="event_name"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLocation">Lokasi Events</label>
                                    <input type="text" class="form-control" id="location" placeholder="location"
                                        name="event_location">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Event</label>
                                    <input class="form-control" type="date" id="dateEvents" name="event_date" />
                                </div>
                                <div class="form-group">
                                    <label>Harga Per Tiket</label>
                                    <input class="form-control" type="number" id="event_price" name="event_price" />
                                </div>
                                {{-- optional  --}}
                                <div class="form-group">
                                    <label>Guest Star</label>
                                    <select class="js-example-basic-multiple" multiple="multiple">
                                        <option value="AL">Peterpan</option>
                                        <option value="WY">Noah</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity1">City</label>
                                    <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location"
                                        name="event_city">
                                </div>
                                <div class="form-group">
                                    <label>Poster</label>
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info"
                                            placeholder="Upload Image" name="event_poster">
                                    </div>
                                </div>
                                {{-- optional  --}}


                                <div class="form-group">
                                    <label for="exampleTextarea1">Deskripsi Events</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="event_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="js-example-basic-multiple form-select" multiple="multiple"
                                        name="tags[]">
                                        <option value="AL">Konser</option>
                                        <option value="WY">Music</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Create Modal --}}

            {{-- End Create --}}


            <div class="row" style="width: 1300px;max-height: 400px;overflow-y:scroll;overflow-x:hidden">

                {{-- events view --}}

                @forelse ($events as $event)
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <img src="/store/mitra/events/{{ $event->event_poster }}" alt="Event Poster" width="400"
                                height="200">
                            <div class="card__content">
                                <p class="card__title">{{ $event->event_name }}</p>
                                <p class="card__description">{{ $event->event_location }} , {{ $event->event_city }}</p>
                                <p class="bold-50">{{ date('d-m-Y', strtotime($event->event_date)) }}</p>
                                <p class="bold-50" style="color: green">Rp. {{ $event->event_price }}</p>
                                <div class="card__button__group">
                                    <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#detailEvent{{ $event->event_id }}">Detail</button>
                                    <button class="btn
                                        btn-success"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateModal{{ $event->event_id }}">Update</button>
                                    <button class="btn btn-danger" id="delete_button" data-bs-toggle="modal"
                                        data-bs-target="#event{{ $event->event_id }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Detail modal --}}
                    <div class="modal fade" id="detailEvent{{ $event->event_id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="/store/mitra/events/{{ $event->event_poster }}" alt="Event Poster"
                                        width="400" height="200" class="card-img-top">
                                    <br>
                                    <hr />
                                    <div class="container mt-3">
                                        <p class="card__title">Event Name : {{ $event->event_name }}</p>
                                        <p class="card__description">Event Location : {{ $event->event_location }} ,
                                            {{ $event->event_city }}</p>
                                        <p class="bold-50">Event Date : {{ date('d-m-Y', strtotime($event->event_date)) }}
                                        </p>
                                        <p class="bold-50" style="color: green">Event Price per Tiket : Rp.
                                            {{ $event->event_price }}</p>
                                        <p class="card-text">Event Description : {{ $event->event_description }}</p>
                                        <p class="card-text">Event Tag : {{ $event->event_tag }}</p>
                                        <hr />
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="card-text">Event Created At :
                                                    {{ date('d-m-Y', strtotime($event->created_at)) }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="card-text">Event Updated At :
                                                    {{ date('d-m-Y', strtotime($event->updated_at)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Detail modal --}}

                    {{-- Update Modal --}}
                    <div class="modal fade" id="updateModal{{ $event->event_id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="createEventForm" class="forms-sample" method="post"
                                        enctype="multipart/form-data"
                                        action="{{ route('events.update', ['id' => $event->event_id]) }}">
                                        @method('put')
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name Event</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                name="event_name" placeholder="Name" value="{{ $event->event_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputLocation">Lokasi Events</label>
                                            <input type="text" class="form-control" id="location"
                                                placeholder="location" name="event_location"
                                                value="{{ $event->event_location }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Event</label>
                                            <input class="form-control" type="date" id="dateEvents" name="event_date"
                                                value="{{ substr($event->event_date, 0, 10) }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Per Tiket</label>
                                            <input class="form-control" type="number" id="event_price" min="0"
                                                name="event_price" value="{{ $event->event_price }}" />
                                        </div>
                                        {{-- optional  --}}
                                        <div class="form-group">
                                            <label>Guest Star</label>
                                            <select class="js-example-basic-multiple" multiple="multiple">
                                                <option value="AL">Peterpan</option>
                                                <option value="WY">Noah</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputCity1">City</label>
                                            <input type="text" class="form-control" id="exampleInputCity1"
                                                placeholder="Location"
                                                name="event_city"value="{{ $event->event_city }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Poster</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" class="form-control file-upload-info"
                                                    placeholder="Upload Image" name="event_poster"
                                                    value="{{ $event->event_poster }}">
                                            </div>
                                        </div>
                                        {{-- optional  --}}


                                        <div class="form-group">
                                            <label for="exampleTextarea1">Deskripsi Events</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="event_description">{{ $event->event_description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tags</label>
                                            <select class="js-example-basic-multiple form-select" multiple="multiple"
                                                name="tags[]">
                                                <option value="AL">Konser</option>
                                                <option value="WY">Music</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Update Modal --}}

                    {{-- Delete Modal --}}
                    <div class="modal fade" id="event{{ $event->event_id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('events.delete', ['id' => $event->event_id]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda ingin menghapus {{ $event->event_name }} event ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Delete Modal --}}
                @empty
                    <div class="container">
                        <div class="alert alert-danger" style="margin:20px 0px 50px 0px; width:250px;">
                            You haven't any events.
                        </div>
                    </div>
                @endforelse

                {{-- end events view --}}
            </div>
        </div>
        {{-- End CRUD Events --}}

        @include('pages.mitra.layouts.footer')
        @push('scripts')
            @if ($message = Session::get('create_event_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
            @if ($message = Session::get('delete_event_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
            @if ($message = Session::get('update_event_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
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

            {{-- Bootstrap JS --}}
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>
            {{-- End Bootstrap JS --}}

            {{-- select2 js --}}
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });
            </script>
            {{-- end select2 js --}}
        @endpush
    </div>
@endsection
