
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="/tema/img/profile_small.jpg"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Marcelo Cuba</span>
                        <span class="text-muted text-xs block">Administrador</span>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-line-chart" aria-hidden="true"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Register</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Customers</a></li>
                    <li><a href="#">Supliers</a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Deposit</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-exchange"></i> <span class="nav-label">Movements</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="#">Entrada</a></li>
                    <li><a href="#">Salida</a></li>
                    <li><a href="#">Reposicion</a></li>
                </ul>
            </li>
            <li class="{{ Route::currentRouteNamed('plans.index') ? 'active' : '' }}">
                <a href="{{ route('plans.index') }}"><i class="fa fa-cube " aria-hidden="true"></i> <span class="nav-label">Plans</span></a>
            </li>
            <li class="{{ Route::currentRouteNamed('profiles.index') ? 'active' : '' }}">
                <a href="{{ route('profiles.index') }}"><i class="fa fa-cube " aria-hidden="true"></i> <span class="nav-label">Profiles</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">General</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> <span class="nav-label">Logout</span></a>
            </li>
        </ul>

    </div>
</nav>
 