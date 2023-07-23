<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- @if (Auth::guard('admin')->user()->type == 'vendor')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Vendor Details</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('update.vendor.details', ['slug' => 'personal']) }}">Personal</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('update.vendor.details', ['slug' => 'business']) }}">Business</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('update.vendor.details', ['slug' => 'bank']) }}">Bank</a></li>
                    </ul>
                </div>
            </li>
        @else --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('update.admin.password') }}">Update
                            Password</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('update.admin.details') }}">Update
                            Details</a></li>
                </ul>
            </div>
        </li>
        @endif --}}

        {{-- events --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="ti-microphone mr-3"></i>
                <span class="menu-title"> Events</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    {{-- add Events  --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Add Events</a>
                    </li>
                    {{-- edit update events  --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Manage Events</a>
                    </li>
                    {{-- add Guestar --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Add Guest Star</a>
                    </li>
            </div>
        </li>
        {{-- // ticket Menu  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ticket" aria-expanded="false"
                aria-controls="form-elements">
                <i class="ti-ticket mr-3"></i>
                <span class="menu-title"> Ticket</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ticket">
                <ul class="nav flex-column sub-menu">
                    {{-- add Events  --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Add Ticket</a>
                    </li>
                    {{-- edit update events  --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Manage Ticket</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Acount Bank  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bank" aria-expanded="false"
                aria-controls="form-elements">
                <i class="ti-credit-card mr-3"></i>
                <span class="menu-title"> Account Bank</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bank">
                <ul class="nav flex-column sub-menu">
                    {{-- add Events  --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Add Account Bank</a>
                    </li>
                    {{-- edit update events  --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Manage Bank
                            Bank</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- // Transaksi Pembelian Tiket  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false"
                aria-controls="form-elements">
                <i class="ti-shopping-cart mr-3"></i>
                <span class="menu-title">Pembelian Tiket</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
                <ul class="nav flex-column sub-menu">
                    {{-- Report Transaksi  --}}
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Report Transaksi
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- withdraw --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#withdraw" aria-expanded="false" aria-controls="charts">
                <i class="ti-money mr-3"></i>
                <span class="menu-title">Withdraw</span>
                <i class="menu-arrow"></i>
            </a>
            {{-- manage withdraw --}}
            <div class="collapse" id="withdraw">
                <ul class="nav flex-column sub-menu">
                    {{-- add withdraw --}}
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Add Withdraw</a></li>
                    {{-- see withdraw --}}
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">See Withdraw</a></li>
                </ul>
            </div>
        </li>

        {{-- Account  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#account" aria-expanded="false" aria-controls="charts">
                <i class="ti-user mr-3"></i>
                <span class="menu-title">Account</span>
                <i class="menu-arrow"></i>
            </a>
            {{-- manage account --}}
            <div class="collapse" id="account">
                <ul class="nav flex-column sub-menu">
                    {{-- add account --}}
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Manage account</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- partial -->
