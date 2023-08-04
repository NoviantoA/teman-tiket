    <script src=" {{ asset('user/vendorku/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('user/vendorku/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Sertakan jQuery dan Popper.js (diperlukan untuk beberapa komponen Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('user/script/navbar-scroll.js') }}"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- End Bootstrap JS --}}

    {{-- select2 js --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- end select2 js --}}

    <!-- SweetAlert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    @if ($message = Session::get('create_transaction_success'))
        <script>
            Swal.fire(
                'Good Job!',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if ($message = Session::get('create_transaction_fail'))
        <script>
            Swal.fire(
                'Sorry!',
                '{{ $message }}',
                'error'
            )
        </script>
    @endif
    @if ($message = Session::get('transaction_validate_fail'))
        <script>
            Swal.fire(
                'Sorry!',
                '{{ $message }}',
                'error'
            )
        </script>
    @endif
    @if ($message = Session::get('email_transaction_fail'))
        <script>
            Swal.fire(
                'Sorry!',
                '{{ $message }}',
                'error'
            )
        </script>
    @endif
    @if ($message = Session::get('name_transaction_fail'))
        <script>
            Swal.fire(
                'Sorry!',
                '{{ $message }}',
                'error'
            )
        </script>
    @endif
    @if ($message = Session::get('phone_transaction_fail'))
        <script>
            Swal.fire(
                'Sorry!',
                '{{ $message }}',
                'error'
            )
        </script>
    @endif
    @if ($message = Session::get('bdate_transaction_fail'))
        <script>
            Swal.fire(
                'Sorry!',
                '{{ $message }}',
                'error'
            )
        </script>
    @endif
    @if ($message = Session::get('gender_transaction_fail'))
        <script>
            Swal.fire(
                'Sorry!',
                '{{ $message }}',
                'error'
            )
        </script>
    @endif
    {{-- End Error Handler from controller --}}

    {{-- Is Logged In --}}
    @if (Auth::user())
        {{-- own script --}}
        <script>
            $(document).ready(function() {
                $("#ticket_count").on('change keyup', function() {
                    const person = $("#ticket_count").val();
                    const price = $("#event_price").val();
                    const total = "Rp. " + person * price
                    $("#total_ticket").html(total);
                });
                for (let i = 1; i < 4; i++) {
                    $(`#check_user_${i}`).on("click", function() {
                        if ($(`#check_user_${i}`).is(":checked")) {
                            $(`#input_email_${i}`).val("{{ Auth::user()->email }}")
                            $(`#input_name_${i}`).val("{{ Auth::user()->name }}")
                            $(`#input_phone_${i}`).val("{{ Auth::user()->no_telp }}")
                            $(`#input_address_${i}`).val("{{ Auth::user()->address }}")
                            $(`#input_date_${i}`).val(
                                "{{ substr(Auth::user()->born_date, 0, 10) }}"
                            )
                            $(`#input_gender_${i}`).html(
                                "<option value={{ Auth::user()->gender }} selected>{{ Auth::user()->gender }}</option>"
                            );
                        } else {
                            $(`#input_email_${i}`).val("")
                            $(`#input_name_${i}`).val("")
                            $(`#input_phone_${i}`).val("")
                            $(`#input_date_${i}`).val("")
                            $(`#input_address_${i}`).val("")
                            $(`#input_gender_${i}`).html(
                                `<option class="text-muted" hidden selected value="">---
                                                            Gender ----
                                                        </option>`
                            )
                        }
                    });
                }


            });
            // Check User trigger button

            // // Check User trigger button
        </script>
        {{-- end own script --}}
    @else
        {{-- own script --}}
        <script>
            $(document).ready(function() {
                $("#ticket_count").on('change keyup', function() {
                    const person = $("#ticket_count").val();
                    const price = $("#event_price").val();
                    const total = "Rp. " + person * price
                    $("#total_ticket").html(total);
                });
            });
        </script>
        {{-- end own script --}}
    @endif
    {{-- End Is Logged In --}}




    @stack('script')
