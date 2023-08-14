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
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories.html">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.history') }}">Histories</a>
                    </li>
                </ul>
                <!-- Desktop Menu -->
                <ul class="navbar-nav ms-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('user/images/icon-user.png') }} " alt=""
                                class="rounded-circle me-5 profile-picture" />

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <p class="dropdown-item">
                                {{ Auth::user()->name }}
                            </p>
                            <a class="dropdown-item" href="#"><i class="bi bi-heart me-2"></i>Wishlist
                            </a>
                            <a class="dropdown-item" href="/dashboard-account.html"><i
                                    class="bi bi-gear me-2"></i>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

                <!-- Mobile Menu -->
            </div>
        </div>
    </nav>
