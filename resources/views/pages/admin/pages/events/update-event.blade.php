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
                        <form action="{{ route('admin.update.event', ['event_id' => $event->event_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Event</label>
                                <input type="text" name="event_name" value="{{ $event->event_name }}" class="form-control" id="rekening" placeholder="Masukan Nama Event">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tanggal Event</label>
                                <input type="date" name="event_date" value="{{ $event->event_date ?? '' }}" class="form-control" id="rekening">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Lokasi Event</label>
                                <input type="text" name="event_location" value="{{ $event->event_location }}" class="form-control" id="rekening" placeholder="Masukan Lokasi Event">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Kota Event</label>
                                <input type="text" name="event_city" value="{{ $event->event_city }}" class="form-control" id="rekening" placeholder="Lokasi Kota Event">
                            </div>
                             <div class="form-group">
                                <label for="event_poster">Poster Event</label>
                                <input type="file" name="event_poster" id="event_poster" class="form-control">
                                @if ($event->event_poster)
                                    <img src="{{ asset('store/mitra/events/' . $event->event_poster) }}" width="280px" height="175px" alt="poster event">
                                @else
                                    <p>No image found</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Deskripsi Event</label>
                                <textarea name="event_description" class="form-control">{{ $event->event_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tag Event</label>
                                <input type="text" name="event_tag" value="{{ $event->event_tag }}" class="form-control" id="rekening" placeholder="Masukan Tag Event">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Tiket</label>
                                <input type="text" name="ticket_name" value="{{ $event->ticket->ticket_name }}" class="form-control" id="rekening" placeholder="Masukan Tag Event">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Kapasitas Tiket</label>
                                <input type="text" name="ticket_capacity" value="{{ $event->ticket->ticket_capacity }}" class="form-control" id="rekening" placeholder="Masukan Tag Event">
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
