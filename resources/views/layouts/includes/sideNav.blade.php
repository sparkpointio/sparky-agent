<ul class="navbar-nav sidebar accordion bg-color-1" id="accordionSidebar" style="border-right:1px solid rgba(16,77,34,0.2)">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home.index') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/home/logo.png') }}" alt="{{ config('app.name') }}" width="54" />
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset('img/home/logo.png') }}" alt="{{ config('app.name') }}" class="tw-max-h-[50px]" />
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin.dashboard.index'])) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fa-solid fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin.users.index', 'admin.users.show'])) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fa-solid fa-fw fa-user"></i>
            <span>Users</span>
        </a>
    </li>

    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin.email-subscriptions.index'])) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.email-subscriptions.index') }}">
            <i class="fa-solid fa-fw fa-envelope"></i>
            <span>Email Subscriptions</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline mb-4">
        <button class="rounded-circle btn-custom-1 border-0" id="sidebarToggle"></button>
    </div>
</ul>
