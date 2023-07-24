@extends('layouts.app')
@section('content')
    {{-- Css in this page --}}
    <style>
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
    </style>
    {{-- End Css in this page --}}

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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-modal-event">New
                        Event</button>
                </div>
            </div>

            {{-- Create Modal --}}
            <div class="modal fade" id="create-modal-event" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="own-input-group my-3">
                                <label class="label">Nama Event</label>
                                <input autocomplete="off" name="Email" id="Email" class="input" type="text">
                            </div>
                            <div class="own-input-group my-3">
                                <label class="label">Tanggal Event</label>
                                <input type="date" id="bdate" class="input">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Create Modal --}}


            {{-- End Create --}}


            <div class="row">
                <div class="col-lg-4">
                    <div class="card mt-3">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                            </path>
                        </svg>
                        <div class="card__content">
                            <p class="card__title">Project Name</p>
                            <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco.</p>
                            <button class="btn btn-success">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End CRUD Events --}}
    </div>


    {{-- Script in this page --}}
    <script>
        var currYear = (new Date()).getFullYear();

        $(document).ready(function() {
            $("#bdate").datepicker({
                defaultDate: new Date(currYear - 5, 1, 31),
                // setDefaultDate: new Date(2000,01,31),
                maxDate: new Date(currYear - 5, 12, 31),
                yearRange: [1928, currYear - 5],
                format: "yyyy/mm/dd"
            });
        });
    </script>
    {{-- End Script in this page --}}
@endsection
