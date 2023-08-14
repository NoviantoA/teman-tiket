@extends('pages.admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ayo Tambahkan Diskon Teman Tiket</h4>
                        <p class="card-description">
                            Semangat Cuan
                        </p>
                        <form action="{{ route('admin.update.ticket', ['ticket_id' => $ticket->ticket_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                                 <div class="form-group">
                                <label for="exampleInputName1">Nama Event</label>
                                <select name="event_id" id="event_id" class="form-control js-example-basic-single" style="width: 100%; height: 50px;">
                                    <option value="" selected="selected">--- Pilih Nama Event---</option>
                                    @foreach ($eventData as $data)
                                        <option value="{{ $data->event_id }}">{{ $data->event_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Tiket</label>
                                <input type="text" name="ticket_name" value="{{ $ticket->ticket_name }}" class="form-control" id="rekening" placeholder="Masukan Nama Tiket">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Kapasitas Tiket</label>
                                <input type="number" name="ticket_capacity" value="{{ $ticket->ticket_capacity }}" class="form-control" id="rekening" placeholder="Masukan Kapasitas Tiket">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tiket Terjual</label>
                                <input type="number" name="ticket_sold" value="{{ $ticket->ticket_sold }}" class="form-control" id="rekening" placeholder="Masukan Tiket Terjual">
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
