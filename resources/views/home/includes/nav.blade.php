<nav class="navbar fixed-top navbar-expand-lg bg-dark-subtle py-2">
    <div class="container d-flex justify-content-between position-relative">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('img/home/logo.png') }}" class="tw-duration-500" alt="{{ config('app.name') }}">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto font-weight-300 justify-content-center align-items-center">
                <li class="nav-item mt-md-2 mt-lg-0">
                    <a class="nav-link {{ (Route::currentRouteName() == 'home.index') ? 'font-weight-600' : 'font-weight-500' }} font-size-110 letter-spacing-5 px-lg-3 px-xl-4" aria-current="page" href="{{ route('home.index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'contact.index') ? 'font-weight-600' : 'font-weight-500' }} font-size-110 letter-spacing-5 px-lg-3 px-xl-4" href="{{ route('contact.index') }}">Contact</a>
                </li>

                <li class="nav-item ms-lg-3 ms-xl-4 mt-2 mt-lg-0 mb-2 mb-lg-0">
                    <a href="#" target="_blank" rel="noreferrer" class="btn btn-custom-1 font-size-110 py-1 px-3">Call to Action</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
