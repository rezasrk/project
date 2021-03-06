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
                <li class="nav-item {{ request()->is('managerpanel/tags*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-tags"></i>
                        <p>
                            کلید واژه
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('tags.index') }}"
                               class="nav-link {{ request()->url() == route('tags.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>کلید واژه </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('managerpanel/contact*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-ticket-alt"></i>
                        <p>
                            پیام ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}"
                               class="nav-link {{ request()->url() == route('contact.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست پیام ها</p>
                            </a>
                        </li>
                    </ul>
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
                            <i class="fa fa-file"></i>
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
                @can('journal-menu')
                    <li class="nav-item {{ request()->is('managerpanel/journal*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fa fa-newspaper"></i>
                            <p>
                                {{ $labels['journal-menu'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            @can('list-journal')
                                <li class="nav-item">
                                    <a href="{{ route('journal.index') }}"
                                       class="nav-link {{ request()->url() == route('journal.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $labels['list-journal'] }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item {{ request()->is('managerpanel/articles*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-tablet-alt"></i>
                        <p>
                            مقاله
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('articles.index') }}"
                               class="nav-link {{ request()->url() == route('articles.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست مقاله ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('managerpanel/cooperator*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-file"></i>
                        <p>
                            همکاران
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cooperator.index') }}"
                               class="nav-link {{ request()->url() == route('cooperator.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست همکاران</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('managerpanel/advertising*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fa fa-file"></i>
                            <p>
                                تبلیغات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('advertising.index') }}"
                                       class="nav-link {{ request()->url() == route('advertising.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>لیست تبلیغات</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
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
                            <li class="nav-item">
                                <a href="{{ route('page') }}"
                                   class="nav-link {{ request()->url() == route('page') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>صفحات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('information') }}"
                                   class="nav-link {{ request()->url() == route('information') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>اطلاعات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guidance') }}"
                                   class="nav-link {{ request()->url() == route('guidance') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>راهنمای سایت</p>
                                </a>
                            </li>
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
