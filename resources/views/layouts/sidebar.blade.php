<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ projectInf()->logo ? projectInf()->logo : '/images/company.png'  }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ auth()->user()->name }}</span>
    </a>
    @php
        $labels = config('labels');
    @endphp
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->is('managerpanel/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ $labels['dashboard'] }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.show') }}"
                       class="nav-link {{ request()->is('managerpanel/profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ $labels['profile'] }}</p>
                    </a>
                </li>
                @can('request-menu')
                    <li class="nav-item {{ request()->is('managerpanel/supply*') ? 'menu-open' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa fa-bullhorn"></i>
                            <p>
                                {{ $labels['request-menu'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            @can('list-categories')
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}"
                                       class="nav-link {{ request()->url() == route('categories.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['list-categories'] }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-requests')
                                <li class="nav-item">
                                    <a href="{{ route('request.index') }}"
                                       class="nav-link {{ request()->url() == route('request.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['list-requests'] }}</p>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('my.requests') }}"
                                   class="nav-link {{ request()->url() == route('my.requests') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $labels['list-my-requests'] }}</p>
                                </a>
                            </li>
                            @can('list-warehouse')
                                <li class="nav-item">
                                    <a href="{{ route('warehouse') }}"
                                       class="nav-link {{ request()->url() == route('warehouse') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <pwarehouse>{{ $labels['list-warehouse'] }}</pwarehouse>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('reports-menu')
                    <li class="nav-item {{ request()->is('managerpanel/report*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fa fa-file"></i>
                            <p>
                                {{ $labels['reports-menu'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            @can('warehouse-report')

                                <li class="nav-item">
                                    <a href="{{ route('report.warehouse') }}"
                                       class="nav-link {{ request()->url() == route('report.warehouse') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['warehouse-report'] }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('settings-menu')
                    <li class="nav-item {{ request()->is('managerpanel/settings*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fa fa-cogs"></i>
                            <p>
                                {{ $labels['settings-menu'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            @can('roles-menu')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                       class="nav-link {{ request()->url() == route('roles.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['roles-menu'] }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('users-menu')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                       class="nav-link {{ request()->url() == route('users.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['users-menu'] }}</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>

                @endcan
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-logout"></i>
                        <p>خروج</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
