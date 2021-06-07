<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    @if(getContact()->count())
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">{{ getContact()->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 پیام خوانده نشده</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('contact.index') }}" class="dropdown-item dropdown-footer">نمایش همه ی پیام ها</a>
                </div>
            </li>
        </ul>
    @endif
</nav>
