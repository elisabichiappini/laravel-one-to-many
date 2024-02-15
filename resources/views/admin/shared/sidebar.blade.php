<!--sidebar-->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse ec-padding">
    <div class="position-fixed pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    {{-- <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> --}} Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'projects' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.projects.index') }}">
                    {{-- <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> --}} Progetti
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'technologies' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.technologies.index') }}">
                    {{-- <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> --}} Tags
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'types' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.types.index') }}">
                    {{-- <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> --}} Categorie
                </a>
            </li>
        </ul>
    </div>
</nav>
<!--/sidebar-->