<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar justify-content-center">
        <div class="pt-4 pb-3">
            <center>
                <img class="img-fluid" src="{{ asset('admin/img/laravel-logo.png') }}" alt="Responsive image" width="100"
                    height="100">
            </center>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>

            <li class="sidebar-item {{ isActive('dashboard') }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
        </ul>


    </div>
</nav>
