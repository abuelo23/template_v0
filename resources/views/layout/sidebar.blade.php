<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('dashboard') }}" class="b-brand text-primary">
                <img src="{{ asset('img/header/diapo.svg') }}" alt="logo image" class="logo-lg" width="auto" height="60"/>
                <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version">v1.0</span>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="material-icons-two-tone">home</i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                @if(auth()->check() && auth()->user()->hasRole('super-admin'))
                <li class="pc-item pc-caption">
                    <label>Administration</label>
                    <i class="ti ti-chart-arcs"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('users.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="material-icons-two-tone">people</i></span>
                        <span class="pc-mtext">Users</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
