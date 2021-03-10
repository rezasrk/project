<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ '/images/company.png'  }}" alt="AdminLTE Logo"
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
                        <i class="nav-icon fa fa-id-card"></i>
                        <p>{{ $labels['profile'] }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('managerpanel/categories*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-bars"></i>
                        <p>
                            {{ $labels['categories-menu'] }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        @can('categories-menu')
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}"
                                   class="nav-link {{ request()->url() == route('categories.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $labels['categories-menu'] }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                @can('users-menu')
                    <li class="nav-item {{ request()->is('managerpanel/users*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fa fa-users"></i>
                            <p>
                                {{ $labels['users-menu'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            @can('list-users')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                       class="nav-link {{ request()->url() == route('users.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['list-users'] }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('publisher-menu')
                    <li class="nav-item {{ request()->is('managerpanel/publisher*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fa fa-users"></i>
                            <p>
                                {{ $labels['publisher-menu'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            @can('list-publisher')
                                <li class="nav-item">
                                    <a href="{{ route('publisher.index') }}"
                                       class="nav-link {{ request()->url() == route('publisher.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['list-publisher'] }}</p>
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
                            @can('admins-menu')
                                <li class="nav-item">
                                    <a href="{{ route('admins.index') }}"
                                       class="nav-link {{ request()->url() == route('admins.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['admins-menu'] }}</p>
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
