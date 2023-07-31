@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('all/vendors/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('all/vendors/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('all/vendors/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">


    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- END Bootstrap CSS --}}

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- End Bootstrap Icon --}}
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

        <div class="row container">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="header">
                            <h3>This is Your Ticket Data Views</h3>

                            {{-- Create Ticket --}}
                            <div class="row my-4">
                                <div class="col-md-4">
                                    <button class="btn btn-success ps-3 pe-3 pt-2 pb-2" data-bs-toggle="modal"
                                        data-bs-target="#createModalTicket"><i class="bi bi-archive me-2"></i>Create New
                                        Ticket</button>
                                </div>
                            </div>
                            {{-- End Create Ticket --}}

                            {{-- Create Ticket Modal --}}
                            <div class="modal fade" id="createModalTicket" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                @if (count($events) == 0)
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Please Create the event
                                                    before</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger" style=" width:250px;">
                                                    You haven't any events.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <form class="forms-sample" action="{!! route('ticket.post') !!}" method="POST">
                                        @csrf
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create New Ticket</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect2">Pilih Event Anda</label>
                                                        <select class="form-control" id="event_select" name="event_name">
                                                            <option selected disabled> -- Pilih Events -- </option>
                                                            @foreach ($events as $key => $value)
                                                                <option value={{ $value->event_id }}>
                                                                    {{ $value->event_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Nama Tiket</label>
                                                        <input type="text" class="form-control" id="nameticket"
                                                            name="nameticket"
                                                            placeholder="Masukan Nama Tiket Yang Ingin Di Jual">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputLocation">Masukan Kuota Tiket</label>
                                                        <input type="text" class="form-control" id="kuotaTicket"
                                                            name="kuotaticket" placeholder="Masukan Kuota Tiket">
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
                                @endif
                            </div>
                            {{-- End Create Ticket Modal --}}
                        </div>

                        {{-- Ticket Data View --}}
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                                    @if (count($tickets) == 0)
                                    @else
                                        <thead class="text-center">
                                            <tr>
                                                <th>Ticket ID</th>
                                                <th>Nama Tiket</th>
                                                <th>Nama Event</th>
                                                <th>Kuota</th>
                                                <th>Harga Tiket</th>
                                                <th>Ticket Terjual</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    @endif
                                    <tbody>
                                        @forelse ($tickets as $ticket)
                                            <tr>
                                                <td class="text-center">{{ $ticket->ticket_id }}</td>
                                                <td>{{ $ticket->ticket_name }}</td>
                                                <td>{{ $ticket->event_name }}</td>
                                                <td class="text-center">{{ $ticket->ticket_capacity }}</td>
                                                <td class="text-center">{{ $ticket->event_price }}</td>
                                                <td class="text-center">{{ $ticket->ticket_sold }}</td>
                                                <td class="text-center">
                                                    <button type="submit" class="btn btn-info me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ticketInfo{{ $ticket->ticket_id }}"><i
                                                            class="bi bi-info-circle"></i></button>
                                                    <button type="submit" class="btn btn-warning me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ticketUpdate{{ $ticket->ticket_id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <button type="submit" class="btn btn-danger me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ticketDelete{{ $ticket->ticket_id }}"><i
                                                            class="bi bi-trash"></i></button>
                                                </td>

                                            </tr>

                                            {{-- Ticket Info Modal --}}
                                            <div class="modal fade" id="ticketInfo{{ $ticket->ticket_id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="/store/mitra/events/{{ $ticket->event_poster }}"
                                                                alt="Event Poster" width="400" height="200"
                                                                class="card-img-top">
                                                            <br>
                                                            <hr />
                                                            <div class="container mt-3">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p class="card__title">Ticket ID :
                                                                            {{ $ticket->ticket_id }}</p>
                                                                        <p class="card__title">Ticket Name :
                                                                            {{ $ticket->ticket_name }}</p>
                                                                        <p class="card__title">Ticket Capacity :
                                                                            {{ $ticket->ticket_capacity }}</p>
                                                                        <p class="card__title">Ticket Capacity :
                                                                            {{ $ticket->ticket_sold }}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p class="card__title">Event Name :
                                                                            {{ $ticket->event_name }}</p>
                                                                        <p class="card__description">Event Location :
                                                                            {{ $ticket->event_location }} ,
                                                                            {{ $ticket->event_city }}</p>
                                                                        <p class="bold-50">Event Date :
                                                                            {{ date('d-m-Y', strtotime($ticket->event_date)) }}
                                                                        </p>
                                                                        <p class="bold-50" style="color: green">Event
                                                                            Price per
                                                                            Tiket : Rp.
                                                                            {{ $ticket->event_price }}</p>
                                                                        <p class="card-text">Event Description :
                                                                            {{ $ticket->event_description }}</p>
                                                                        <p class="card-text">Event Tag :
                                                                            {{ $ticket->event_tag }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Ticket Info Modal --}}

                                            {{-- Ticket Update Modal --}}
                                            <div class="modal fade" id="ticketUpdate{{ $ticket->ticket_id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form class="forms-sample"
                                                    action="{{ route('ticket.update', ['id' => $ticket->ticket_id]) }}"
                                                    method="POST">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update
                                                                    Ticket Informations</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName1">Nama Tiket</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nameticket" name="nameticket"
                                                                        placeholder="Masukan Nama Tiket Yang Ingin Di Jual"
                                                                        value="{{ $ticket->ticket_name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputLocation">Masukan Kuota
                                                                        Tiket</label>
                                                                    <input type="text" class="form-control"
                                                                        id="kuotaTicket" name="kuotaticket"
                                                                        placeholder="Masukan Kuota"
                                                                        value="{{ $ticket->ticket_capacity }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- End Ticket Update Modal --}}

                                            {{-- Delete Ticket Modal --}}
                                            <div class="modal fade" id="ticketDelete{{ $ticket->ticket_id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form class="forms-sample"
                                                    action="{{ route('ticket.delete', ['id' => $ticket->ticket_id]) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are You
                                                                    Sure to Delete ?</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5 class="text-danger">{{ $ticket->ticket_name }} Will Be
                                                                    Permanently Deleted!
                                                                </h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- End Delete Ticket Modal --}}

                                        @empty
                                            <div class="alert alert-danger"
                                                style="margin:20px 0px 50px 0px; width:250px;">
                                                You haven't any tickets.
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- End Ticket Data View --}}
                    </div>
                </div>
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
            @if ($message = Session::get('create_ticket_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
            @if ($message = Session::get('create_ticket_fail'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'error'
                    )
                </script>
            @endif
            @if ($message = Session::get('update_ticket_success'))
                <script>
                    Swal.fire(
                        'Good job!',
                        '{{ $message }}',
                        'success'
                    )
                </script>
            @endif
            @if ($message = Session::get('delete_ticket_success'))
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
                    $("#event_select").change(function() {
                        const id = $("#event_select").val();

                    })
                });
            </script>
        @endpush
    </div>
@endsection
