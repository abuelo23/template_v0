<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="pc-loader">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{route('dashboard')}}" class="b-brand text-center">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{asset('img/header/diapo.svg')}}" alt="logo image" class="logo-lg ms-4" width="auto"
                    height="35" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{route('dashboard')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="material-icons-two-tone">home</i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="material-icons-two-tone">group</i></span>
                        <span class="pc-mtext">Menu levels</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">
                                Level 2.2
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                            </a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">
                                        Level 3.3
                                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                                    </a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">
                                Level 2.3
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                            </a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">
                                        Level 3.3
                                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                                    </a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="{{ route('register') }}" class="pc-link">
                        <span class="pc-micon"><i class="material-icons-two-tone">person_add_alt_1</i></span>
                        <span class="pc-mtext">Register</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->