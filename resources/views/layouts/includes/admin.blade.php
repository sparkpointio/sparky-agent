<div id="wrapper">
    @include('layouts.includes.sideNav')

    <div id="content-wrapper" class="d-flex flex-column bg-white">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-bs-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="me-3 d-none d-md-inline text-color-3 small">{{ Auth::user()->fullName() }}</span>
                            <div class="img-profile rounded-circle background-image-cover" style="background-image:url('{{ Auth::user()->photo() }}'); border:1px solid rgba(16,77,34,0.2); height:40px; width:40px"></div>
                        </a>

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

        <footer class="sticky-footer bg-white" style="border-top:1px solid rgba(16,77,34,0.2)">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © {{ config('app.name') }} {{ date('Y') }}</span>
                </div>
            </div>
        </footer>
    </div>
</div>
