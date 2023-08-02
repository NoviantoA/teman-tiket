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
    {{-- End Error Handler from controller --}}

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
    @stack('script')
