<ul class="navbar-nav sidebar accordion bg-color-3" id="agent-sidebar" style="border-right:1px solid rgba(16,77,34,0.2)">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon mt-2 mt-md-0">
            <img src="{{ asset('img/home/logo.png') }}" alt="{{ config('app.name') }}" width="60" />
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset('img/home/logo.png') }}" alt="{{ config('app.name') }}" class="!tw-max-h-[120px]" />
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <div class="text-center px-3 py-2 mb-4">
        <button class="btn btn-custom-3 bg-white w-100 tw-rounded-[100px] py-2 font-size-90 create-agent-lg" id="create-agent-redirect">Create Agent</button>
        <button class="btn btn-custom-3 mt-3 mt-md-0 bg-white !tw-w-[50px] !tw-h-[50px] tw-rounded-[100px] py-2 font-size-90 create-agent-sm">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    <div class="sidebar-heading text-white !tw-text-[0.8em] mb-3">Agents</div>

    <div class="sidebar-card d-none mt-3 no-agents-found-container">
        <p class="text-center mb-0">You have no AI Agents yet.</p>
    </div>

    <div id="agents-list-side-container"></div>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline mt-4 mb-4">
        <button class="rounded-circle btn-custom-3 border-0" id="sidebarToggle"></button>
    </div>
</ul>
