    <!-- Menu -->
    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
        <div class="container-xxl d-flex h-100">
            <ul class="menu-inner">
                <!-- Dashboards -->
                <li class="menu-item {{ Request::is('/', 'home') ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Dashboards">Dashboards</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="/" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                                <div data-i18n="Analytics">Analytics</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('change/ship') ? 'active' : '' }}">
                            <a href="/change/ship" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-ship"></i>
                                <div data-i18n="Change Ship">Change Ship</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Apps -->
                @can('Inventory-List')
                    <li class="menu-item {{ Request::is('exitingdata','newstock') ? 'active' : '' }}">
                        <a href="/" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons ti ti-packages'></i>
                            <div data-i18n="Inventory">Inventory</div>
                        </a>
                        @can('Exiting-Data-List')
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('exitingdata') ? 'active' : '' }}">
                                    <a href="{{ route('exitingdata.index') }}" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-file-export"></i>
                                        <div data-i18n="Exiting Data">Exiting Data</div>
                                    </a>
                                </li>
                            @endcan
                            @can('Inventory-Stock-List')
                                <li class="menu-item {{ Request::is('newstock') ? 'active' : '' }}">
                                    <a href="/newstock" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-package"></i>
                                        <div data-i18n="Inventory Stock">Inventory Stock</div>
                                    </a>
                                </li>
                            @endcan
                            @can('Transaction-In-List')
                                <li class="menu-item {{ Request::is('transactionin') ? 'active' : '' }}">
                                    <a href="{{ route('transactionin.index') }}" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-file-arrow-left"></i>
                                        <div data-i18n="Transaction In">Transaction In</div>
                                    </a>
                                </li>
                            @endcan
                            @can('Transaction-Out-List')
                                <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-file-arrow-right"></i>
                                        <div data-i18n="Transaction Out">Transaction Out</div>
                                    </a>
                                </li>
                            @endcan
                            @can('Report-Inventory-List')
                                <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-report"></i>
                                        <div data-i18n="Report Inventory">Report Inventory</div>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="menu-item {{ Request::is('approvaltemplate') ? 'active' : '' }}">
                    <a href="/" class="menu-link menu-toggle">
                        <i class='menu-icon tf-icons ti ti-engine'></i>
                        <div data-i18n="PMS">PMS</div>
                    </a>
                    <ul class="menu-sub">
                            <li class="menu-item {{ Request::is('approvaltemplate') ? 'active' : '' }}">
                                <a href="/approvaltemplate" class="menu-link menu-link">
                                    <i class="menu-icon tf-icons ti ti-template"></i>
                                    <div data-i18n="Approval Template">Approval Template</div>
                                </a>
                            </li>
                    </ul>
                </li>
                @if (auth()->user()->can('ship-list'))
                    <li class="menu-item {{ Request::is('ship') ? 'active' : '' }}">
                        <a href="/" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons ti ti-ship'></i>
                            <div data-i18n="Ship">Ship</div>
                        </a>
                        <ul class="menu-sub">
                            @can('ship-list')
                                <li class="menu-item {{ Request::is('ship') ? 'active' : '' }}">
                                    <a href="/ship" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-ship"></i>
                                        <div data-i18n="Ship">Ship</div>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
                @can('crew-list')
                    <li class="menu-item {{ Request::is('crew') ? 'active' : '' }}">
                        <a href="/" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons ti ti-user-star'></i>
                            <div data-i18n="Crew">Crew</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ Request::is('crew') ? 'active' : '' }}">
                                <a href="/crew" class="menu-link menu-link">
                                    <i class="menu-icon tf-icons ti ti-user-star"></i>
                                    <div data-i18n="Crew">Crew</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @if (auth()->user()->can('user-list') ||
                        auth()->user()->can('role-list'))
                    <li class="menu-item {{ Request::is('roles', 'users') ? 'active' : '' }}">
                        <a href="/" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons ti ti-user'></i>
                            <div data-i18n="User">User</div>
                        </a>
                        <ul class="menu-sub">
                            @can('users-list')
                                <li class="menu-item {{ Request::is('users') ? 'active' : '' }}">
                                    <a href="{{ route('users.index') }}" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-users"></i>
                                        <div data-i18n="Users">Users</div>
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="menu-item {{ Request::is('roles') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}" class="menu-link menu-link">
                                        <i class="menu-icon tf-icons ti ti-settings"></i>
                                        <div data-i18n="Roles">Roles</div>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </aside>
    <!-- / Menu -->
