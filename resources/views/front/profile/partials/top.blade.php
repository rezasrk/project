<div class="row align-items-center">
    <div class="col-6 col-md-3">
        <div class="header-user__logo">
            <img src="{{ asset('front/theme/assets/images/474.png') }}" class="header-user__logo_img"
                 alt="portal logo">
        </div>
    </div>
    <div class="d-block d-md-none col-6 col-md-3">
        <div class="header-user__btns">
            <div class="header-user__btns_panel">
                <button class="header-user__btns_panel__btn">
                    پنل کاربری
                    <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="header-user__btns_panel__items">
                    <li><a href="#">
                            پنل کاربری
                        </a>
                    </li>
                    <li><a href="#">
                            خروج
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <form class="header-user__form">
            <div class="header-user__form_box">
                <input type="text" class="header-user__form_input" placeholder="جستجو کنید::.">
                <button class="header-user__form_btn">
                    <img src="{{ asset('front/theme/assets/images/icon/search-icon.svg') }}" alt="" srcset="">
                </button>
            </div>
        </form>
    </div>
    @if(auth('front')->check())
        <div class="d-none d-md-block col-md-3">
            <div class="header-user__btns">
                <div class="header-user__btns_panel">
                    <button class="header-user__btns_panel__btn">
                        پنل کاربری
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <ul class="header-user__btns_panel__items">
                        <li><a href="{{ route('front.profile') }}">
                            داشبورد
                        </a>
                    </li>
                        <li><a href="{{ route('front.logout') }}">
                                خروج
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="col-12">

        <hr style="background-color: #237957; height: 2px;"/>
    </div>
</div>
