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
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
<<<<<<< HEAD
                <i class="ti-microphone mr-3"></i>
                <span class="menu-title">Manage Events</span>
=======
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Form</span>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
<<<<<<< HEAD
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Manage Events</a>
=======
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
<<<<<<< HEAD
                <i class="fa fa-user-circle-o mr-3"></i>
                <span class="menu-title">Mitra</span>
=======
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
<<<<<<< HEAD
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Tambah Mitra</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Manage Mitra</a></li>
=======
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
<<<<<<< HEAD
                <i class="ti-ticket mr-3"></i>
                <span class="menu-title">Ticket</span>
=======
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Tables</span>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
<<<<<<< HEAD
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Manage Ticket</a>
                    </li>
=======
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
<<<<<<< HEAD
                <i class="ti-tag mr-3"></i>
                <span class="menu-title">Diskon</span>
=======
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Icons</span>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
<<<<<<< HEAD
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Add Diskon</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Manage Diskon</a></li>
=======
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
<<<<<<< HEAD
                <i class="ti-id-badge mr-3"></i>
                <span class="menu-title">User</span>
=======
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
<<<<<<< HEAD
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Manage User </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="error">
                <i class="ti-user mr-3"></i>
                <span class="menu-title">Admin</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Add Admin </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> Manage Admin </a>
                    </li>
=======
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
<<<<<<< HEAD
                <i class="ti-receipt mr-3"></i>
                <span class="menu-title">Withdraw</span>
=======
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
<<<<<<< HEAD
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html">Manage
                            Withdraws</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> Manage Withdraw
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false"
                aria-controls="reports">
                <i class="ti-files mr-3"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html">Reports Event</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html">Reports User
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html">Reports Mitra
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html">Reports Ticket
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html">Reports Withdraw
                        </a>
                    </li>
=======
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
                </ul>
            </div>
        </li>
        <li class="nav-item">
<<<<<<< HEAD
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false"
                aria-controls="reports">
                <i class="ti-wallet mr-3"></i>
                <span class="menu-title">Transaksi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html">Manage
                            Transaksi</a>
                    </li>
                </ul>
            </div>
=======
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
>>>>>>> 84fd6cca74cc3d9d90c62f6f1e222b10a70e2f7b
        </li>
    </ul>
</nav>
<!-- partial -->
