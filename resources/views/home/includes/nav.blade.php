<nav class="navbar fixed-top navbar-expand-lg bg-dark-subtle py-2">
    <div class="container d-flex justify-content-between position-relative">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('img/home/logo.png') }}" class="tw-duration-500" alt="{{ config('app.name') }}">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto font-weight-300 justify-content-center align-items-center pb-3 pb-lg-0">
                <li class="nav-item mt-md-2 mt-lg-0">
                    <a class="nav-link {{ (Route::currentRouteName() == 'home.index') ? 'font-weight-600' : 'font-weight-500' }} font-size-110 letter-spacing-5 px-lg-3 px-xl-4" aria-current="page" href="{{ route('home.index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'contact.index') ? 'font-weight-600' : 'font-weight-500' }} font-size-110 letter-spacing-5 px-lg-3 px-xl-4" href="{{ route('contact.index') }}">Contact</a>
                </li>

                <li class="nav-item {{ Auth::check() ? 'ms-lg-3 ms-xl-4' : 'mx-lg-3 mx-xl-4' }} mt-2 mt-lg-0 mb-2 mb-lg-0">
                    <a href="{{ route('register.index') }}" class="btn btn-custom-1 font-size-100 tw-py-[5px] px-3">Register Now</a>
                </li>

                @if(Auth::check())
                <li class="nav-item dropdown ms-lg-3 ms-xl-4 mt-2 mt-lg-0 mb-2 mb-lg-0">
                    <a class="nav-link text-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-circle font-size-200 tw-pt-[0.1em]"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end py-2 font-size-90">
                        <li>
                            @if(Auth::user()->role == 1)
                            <a class="dropdown-item text-center text-lg-start pe-4" href="{{ route('admin.dashboard.index') }}">
                                <div class="d-flex">
                                    <div class="tw-w-[16px] text-center">
                                        <i class="fa-solid fa-tachometer-alt"></i>
                                    </div>
                                    <div class="ps-3">
                                        Admin Dashboard
                                    </div>
                                </div>
                            </a>
                            @endif
                            <a class="dropdown-item text-center text-lg-start pe-4" href="{{ route('logout.index') }}">
                                <div class="d-flex">
                                    <div class="tw-w-[16px] text-center">
                                        <i class="fa-solid fa-sign-out"></i>
                                    </div>
                                    <div class="ps-3">
                                        Log Out
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
