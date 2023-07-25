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
    @stack('script')
