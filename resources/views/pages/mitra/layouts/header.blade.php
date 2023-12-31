<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('mitra.dashboard') }}"><img
                src="{{ asset('user/images/tt.png') }}" class="mr-2" alt="logo" /> Teman tiket</a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('mitra.dashboard') }}"><img
                src="{{ asset('user/images/tt.png') }}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown"
                    aria-expanded="false">
                    <img src="{{ Auth::user()->img_profile == '' ? asset('user/images/icon-user.png') : '/store/mitra/profile/' . Auth::user()->img_profile }}"
                        alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('mitra.index.setting') }}">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
