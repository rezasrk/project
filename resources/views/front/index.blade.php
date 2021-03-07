@extends('front.master')

@section('front-title-page','صفحه ی اصلی')

@section('front-content')
    <header class="header">
        <div class="container">

            <div class="header__top">
                <div class="header__top_logo">
                    <img src="{{ asset('/assets/images/474.png') }}" alt="">
                </div>

                <div class="header__top_btn">
                    @if(auth()->guard('front')->check())
                        <a href="{{ route('front.profile','user') }}" class="button-1">
                            داشبورد
                        </a>
                    @else
                        <button class="button-1" type="button" data-bs-toggle="modal" data-bs-target="#modalAuth">
                            عضویت / ورود
                        </button>
                    @endif
                </div>
            </div>

            <div class="header__grid">


                <div class="header__form">
                    <div class="header__title">
                        <h1>پرتال جامع فلسفه علوم طبیعی و فناوری</h1>
                    </div>

                    <div class="header__form_search">
                        <select name="" id="" class="header__form_search__select">
                            <option value="0">عنوان مطلب</option>
                            <option value="1">مجلات</option>
                            <option value="2">پدیدآورندگان</option>
                            <option value="3">حوزه تخصصی</option>
                            <option value="4">ناشران</option>
                        </select>
                        <div class="header__form_grid">

                            <input type="text" class="header__form_search__input" placeholder="جستجو">
                            <button class="header__form_search__btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                        <a href="#" class="header__form_search__advance-search">جستجوی پیشرفته</a>
                    </div>
                </div>

                <div class="header__cat">

                    <ul class="header__cat_items">
                        <li class="header__cat_item">
                            <a href="#">حوضه های تخصصی</a>
                        </li>
                        <li class="header__cat_item">
                            <a href="#">پدیدآورندگان</a>
                        </li>
                        <li class="header__cat_item">
                            <a href="#">مجلات</a>
                        </li>
                        <li class="header__cat_item">
                            <a href="#">مجلات</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="section-main-categorise">
        <div class="container">
            @if($subjectCategories->count() > 0)
                <div class="cateqory-main">
                    <div class="cateqory-main__head">
                        <h3>دسته بندی موضوعی</h3>
                    </div>
                    <ul class="cateqory-main_items">
                        @foreach($subjectCategories as $subjectCategory)
                            <li class="cateqory-main_item">
                                <a href="#" class="button-1">{{ $subjectCategory->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>

    <section class="section-Publishers">

        <div class="container">
            <div class="section-head">
                <h3>ناشران</h3>
                <a href="#">مشاهده بیشتر</a>
            </div>

            <div class="swiper-container publishers-slider" dir="rtl">
                <div class="swiper-wrapper">
                    <div class="swiper-slide publishers__card">
                        <a href="#" class="publishers__card_image">
                            <img src="{{ asset('/front/theme/assets/images/mehr.png') }}" alt="">
                        </a>
                        <h4 class="publishers__card_title">
                            <a href="#">
                                کتابخانه مرکزی پژوهشگاه
                            </a>
                        </h4>
                        <ul class="publishers__card_options">
                            <li>مجلات: 2</li>
                            <li>مقالات: 2</li>
                            <li>شمارگان: 10</li>
                        </ul>
                    </div>
                    <div class="swiper-slide publishers__card">
                        <a href="#" class="publishers__card_image">
                            <img src="{{ asset('/front/theme/assets/images/mehr.png') }}" alt="">
                        </a>
                        <h4 class="publishers__card_title">
                            <a href="#">
                                کتابخانه مرکزی پژوهشگاه
                            </a>
                        </h4>
                        <ul class="publishers__card_options">
                            <li>مجلات: 2</li>
                            <li>مقالات: 2</li>
                            <li>شمارگان: 10</li>
                        </ul>
                    </div>
                    <div class="swiper-slide publishers__card">
                        <a href="#" class="publishers__card_image">
                            <img src="{{ asset('/front/theme/assets/images/mehr.png') }}" alt="">
                        </a>
                        <h4 class="publishers__card_title">
                            <a href="#">
                                کتابخانه مرکزی پژوهشگاه
                            </a>
                        </h4>
                        <ul class="publishers__card_options">
                            <li>مجلات: 2</li>
                            <li>مقالات: 2</li>
                            <li>شمارگان: 10</li>
                        </ul>
                    </div>
                    <div class="swiper-slide publishers__card">
                        <a href="#" class="publishers__card_image">
                            <img src="{{ asset('/front/theme/assets/images/mehr.png') }}" alt="">
                        </a>
                        <h4 class="publishers__card_title">
                            <a href="#">
                                کتابخانه مرکزی پژوهشگاه
                            </a>
                        </h4>
                        <ul class="publishers__card_options">
                            <li>مجلات: 2</li>
                            <li>مقالات: 2</li>
                            <li>شمارگان: 10</li>
                        </ul>
                    </div>
                    <div class="swiper-slide publishers__card">
                        <a href="#" class="publishers__card_image">
                            <img src="{{ asset('/front/theme/assets/images/mehr.png') }}" alt="">
                        </a>
                        <h4 class="publishers__card_title">
                            <a href="#">
                                کتابخانه مرکزی پژوهشگاه
                            </a>
                        </h4>
                        <ul class="publishers__card_options">
                            <li>مجلات: 2</li>
                            <li>مقالات: 2</li>
                            <li>شمارگان: 10</li>
                        </ul>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>
    </section>


    <section class="section-blog">

        <div class="container">
            <div class="section-head">
                <h3>مجلات</h3>
                <a href="#">مشاهده بیشتر</a>
            </div>

            <div class="swiper-container publishers-slider" dir="rtl">
                <div class="swiper-wrapper">
                    <div class="swiper-slide publishers__card">
                        <a href="#" class="publishers__card_image">
                            <img src="{{ asset('/front/theme/assets/images/mehr.png') }}" alt="">
                        </a>
                        <h4 class="publishers__card_title">
                            <a href="#">
                                حسابداری ارزشی و اسلامی
                            </a>
                        </h4>
                        <ul class="publishers__card_options">
                            <li>موضوع: حسابداری</li>
                            <li>ناشر: خوارزمی</li>
                            <li>اخرین شماره: دستاورد های حسابداری</li>
                        </ul>
                    </div>

                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>
    </section>


    <section class="section-authors">
        <div class="container">
            <div class="section-head">
                <h3>پدید آورندگان</h3>
                <a href="#">مشاهده بیشتر</a>
            </div>
            <div class="swiper-container slider-two" dir="rtl">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('/front/theme/assets/images/icon/brand1.png') }}" alt="">
                            <h4>کتابخانه مرکزی پژوهشگاه</h4>
                        </a>
                        <ul>
                            <li>تعداد مقالات: (11)</li>
                            <li>تعداد مقالات تخصصی: (5)</li>
                        </ul>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('/front/theme/assets/images/icon/brand2.png') }}" alt="">
                            <h4>پژوهشگاه علوم انسانی و مطالعات فرهنگی</h4>
                        </a>
                        <ul>
                            <li>تعداد مقالات: (11)</li>
                            <li>تعداد مقالات تخصصی: (5)</li>
                        </ul>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('/front/theme/assets/images/icon/brand1.png') }}" alt="">
                            <h4>کتابخانه مرکزی پژوهشگاه</h4>
                        </a>
                        <ul>
                            <li>تعداد مقالات: (11)</li>
                            <li>تعداد مقالات تخصصی: (5)</li>
                        </ul>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('/front/theme/assets/images/icon/brand2.png') }}" alt="">
                            <h4>پژوهشگاه علوم انسانی و مطالعات فرهنگی</h4>
                        </a>
                        <ul>
                            <li>تعداد مقالات: (11)</li>
                            <li>تعداد مقالات تخصصی: (5)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="section-authors">
        <div class="container">
            <div class="section-head">
                <h3>همکاران</h3>
                <a href="#">مشاهده بیشتر</a>
            </div>
            <div class="swiper-container slider-two" dir="rtl">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('/front/theme/assets/images/icon/brand1.png') }}" alt="">
                            <h4>کتابخانه مرکزی پژوهشگاه</h4>
                        </a>

                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('/front/theme/assets/images/icon/brand2.png') }}" alt="">
                            <h4>پژوهشگاه علوم انسانی و مطالعات فرهنگی</h4>
                        </a>

                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('front/theme/assets/images/icon/brand1.png') }}" alt="">
                            <h4>کتابخانه مرکزی پژوهشگاه</h4>
                        </a>

                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="{{ asset('/front/theme/assets/images/icon/brand2.png') }}" alt="">
                            <h4>پژوهشگاه علوم انسانی و مطالعات فرهنگی</h4>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('front-script')
    <script>
        $(document).on('click', '.register', function () {
            var targetElement = $(this);
            buttonLoading(targetElement)
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg);
                }
                buttonRemoveLoading(targetElement);
            });
        });

        $(document).on('click', '.login', function () {
            var targetElement = $(this);
            buttonLoading(targetElement);
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg)
                    setTimeout(function () {
                        window.location.href = response.url;
                    }, 2000)
                } else {
                    errorAlert(response.msg)
                }
                buttonRemoveLoading(targetElement);
            })

        })
    </script>
@endsection
