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
            <a href="{{ route('dashboard.index') }}" class="b-brand text-center">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{asset('img/header/diapo.svg')}}" alt="logo image" class="logo-lg ms-4" width="auto" height="35" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('dashboard.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="material-icons-two-tone">home</i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('users.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="material-icons-two-tone">group</i></span>
                        <span class="pc-mtext">Usuarios</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="material-icons-two-tone">group</i></span>
                        <span class="pc-mtext">Bancos</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('banco_bdv.index') }}">Banco BDV</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('banco_bt.index') }}">Banco BT</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('banco_tdc.index') }}">Banco TDC</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
