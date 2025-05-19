<div id="wrapper">
    @include('layouts.includes.agentSideNav')

    <div id="content-wrapper" class="d-flex flex-column bg-white">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown no-arrow">
                        <div id="wallet-container"></div>

                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in text-color-3" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('logout.index') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>
