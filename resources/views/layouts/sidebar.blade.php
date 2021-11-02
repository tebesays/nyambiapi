<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{(Request::segment(1) == 'dashboard') ? 'active' : ''}}" href="#" aria-expanded="false"><i class="fas fa-fw fa-chart-pie"></i>Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{(Request::segment(1) == 'transaction') ? 'active' : ''}}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Transaction</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('transaction/courier') }}">Courier</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('transaction/worker') }}">Daily Worker</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{(Request::segment(1) == 'user') ? 'active' : ''}}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Profile <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('user/mobile') }}">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('user/courier') }}">Couriers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('user/admin') }}">Admins</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>