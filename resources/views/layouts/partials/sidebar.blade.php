<nav class="sb-sidenav accordion sb-sidenav-light w-72 shadow" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav text-lg font-semibold"> <!-- Font size bada -->
            <a class="nav-link py-3 px-4" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt fa-lg"></i> <!-- Icon size bada -->
                </div>
                Dashboard
            </a>

            <!-- Users Dropdown -->
            @canany(['view users', 'view superadmins', 'view admins', 'view logistics', 'view customers'])
                <a class="nav-link collapsed py-3 px-4" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    Users
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
            @endcanany
            <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav text-base">
                    @can('view users')
                        <a class="nav-link py-2 px-4" href="{{ route('user.list') }}">Total Users</a>
                    @endcan
                    @can('view superadmins')
                        <a class="nav-link py-2 px-4" href="#">Superadmin</a>
                    @endcan
                    @can('view admins')
                        <a class="nav-link py-2 px-4" href="#">Admin</a>
                    @endcan
                    @can('view logistics')
                        <a class="nav-link py-2 px-4" href="#">Logistics</a>
                    @endcan
                    @can('view customers')
                        <a class="nav-link py-2 px-4" href="#">Customer</a>
                    @endcan
                </nav>
            </div>

            @canany(['view roles', 'view permissions'])
                <!-- Access Control Dropdown -->
                <a class="nav-link collapsed py-3 px-4" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseAccessControl" aria-expanded="false" aria-controls="collapseAccessControl">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-shield-alt fa-lg"></i>
                    </div>
                    Access Control
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
            @endcanany
            <div class="collapse" id="collapseAccessControl" aria-labelledby="headingTwo"
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav text-base">
                    @can('view roles')
                        <a class="nav-link py-2 px-4" href="{{ route('roles.index') }}">Roles</a>
                    @endcan
                    @can('view permissions')
                        <a class="nav-link py-2 px-4" href="{{ route('permissions.index') }}">Permissions</a>
                    @endcan
                </nav>
            </div>
            <!-- Products Dropdown -->
            <a class="nav-link collapsed py-3 px-4" href="#" data-bs-toggle="collapse"
                data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-box fa-lg"></i>
                </div>
                Products
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div class="collapse" id="collapseProducts" aria-labelledby="headingThree"
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav text-base">
                    <a class="nav-link py-2 px-4" href="{{ route('products.index') }}">All Products</a>
                </nav>
            </div>
        </div>
    </div>
</nav>
