    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top text-center"
        data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">
                <img src="{{ asset('user/images/tt.png') }}" alt="" height="64px" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbarResponsive">
                <form class="form-inline d-flex mx-auto align-items-center justify-content-center">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" style="width: 300px;" />
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories.html">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success nav-link px-4 text-white" href="{{ route('login') }}">Sign In</a>
                    </li>
                </ul>

                <!-- Mobile Menu -->
            </div>
        </div>
    </nav>
