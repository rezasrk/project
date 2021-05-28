@extends('front.master')

@section('front-title-page','صفحه ی اصلی')

@section('front-content')
    <header class="header">
        <div class="container">

            <div class="header__top">
                <div class="header__top_logo">
                    <img src="{{ asset('front/theme/assets/images/474.png') }}" alt="">
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
                        <select name="" id="" class="header__form_search__select search select-search">
                            <option value>عنوان مطلب</option>
                            <option data-url='{{ route('front.creator') }}'>پدیدآورندگان</option>
                            <option data-url='{{ route('front.page.publisher') }}'>نشریات</option>
                            <option data-url='{{ route('front.page.journal') }}'>مجلات</option>
                            <option data-url='{{ route('front.page.article') }}'>مقالات</option>
                        </select>
                        <div class="header__form_grid">

                            <input type="text" class="header__form_search__input search-input-all" placeholder="جستجو">
                            <button type="button" class="header__form_search__btn button-search-all">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>


                    </div>
                </div>

                <div class="header__cat">

                    <ul class="header__cat_items">
                        <li class="header__cat_item">
                            <a href="{{ route('front.creator') }}">پدیدآورندگان</a>
                        </li>
                        <li class="header__cat_item">
                            <a href="{{ route('front.page.publisher') }}">نشریات</a>
                        </li>
                        <li class="header__cat_item">
                            <a href="{{ route('front.page.journal') }}">مجلات</a>
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
    @if($publishers->count())
        <section class="section-Publishers">

            <div class="container">
                <div class="section-head">
                    <h3>ناشران</h3>
                    <a href="{{ route('front.page.publisher') }}">مشاهده بیشتر</a>
                </div>

                <div class="swiper-container publishers-slider" dir="rtl">
                    <div class="swiper-wrapper">
                        @foreach($publishers as $publisher)
                            <div class="swiper-slide publishers__card">
                                <a href="{{ route('front.page.publisher.show',$publisher->id) }}"
                                   class="publishers__card_image">
                                    @if($publisher->image)
                                        <img width="200px" height="200px" src="{{ url('storage/'.$publisher->image)  }}"
                                             alt="">
                                    @else
                                        <img src="{{ asset('front/theme/assets/images/mehr.png') }}" alt="">
                                    @endif
                                </a>
                                <h4 class="publishers__card_title">
                                    <a href="{{ route('front.page.publisher.show',$publisher->id) }}">
                                        {{ $publisher->title }}
                                    </a>
                                </h4>
                                <ul class="publishers__card_options">
                                    <li>مجلات: {{ $publisher->journals()->count() }}</li>
                                    <li>مقالات: {{ $publisher->articles()->count() }}</li>
                                    <li>شمارگان: {{ $publisher->journalNumbers()->count() }}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>
        </section>
    @endif

    @if($journals->count())
        <section class="section-blog">

            <div class="container">
                <div class="section-head">
                    <h3>مجلات</h3>
                    <a href="#">مشاهده بیشتر</a>
                </div>

                <div class="swiper-container publishers-slider" dir="rtl">
                    <div class="swiper-wrapper">
                        @foreach($journals as $journal)
                            <div class="swiper-slide publishers__card">
                                <a href="{{ route('front.page.journal.show',$journal->id) }}"
                                   class="publishers__card_image">
                                    @if($journal->image)
                                        <img src="{{ url('storage/'.$journal->image) }}" alt="">
                                    @else
                                        <img src="{{ asset('front/theme/assets/images/mehr.png') }}" alt="">
                                    @endif

                                </a>
                                <h4 class="publishers__card_title">
                                    <a href="#">
                                        {{ $journal->journal_title }}
                                    </a>
                                </h4>
                                <ul class="publishers__card_options">
                                    <li>ناشر: {{ $journal->publish->title }}</li>
                                    <li>اخرین شماره: {{ $journal->journalNumbers()->first()->title }}</li>
                                </ul>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>
        </section>
    @endif
    @if($creators->count())
        <section class="section-authors">
            <div class="container">
                <div class="section-head">
                    <h3>پدید آورندگان</h3>
                    <a href="{{ route('front.creator.index') }}">مشاهده بیشتر</a>
                </div>
                <div class="swiper-container slider-two" dir="rtl">
                    <div class="swiper-wrapper">
                        @foreach($creators as $creator)
                            <div class="swiper-slide">
                                <a href="{{ route('front.creator.show',$creator->id) }}">
                                    @if($creator->image)
                                        <img src="{{ url('storage/'.$creator->image) }}" alt="">
                                    @else
                                        <img src="{{ asset('front/theme/assets/images/default-avatar.jpg') }}">
                                    @endif
                                    <h4>
                                        نام : {{ $creator->name }}
                                        <hr>
                                        نام کاربری :{{ $creator->username }}
                                    </h4>
                                </a>
                                <ul>
                                    <li>تعداد مقالات: ( {{ $creator->articleCount }} )</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
    @endif
    @if($cooperators->count())
        <section class="section-authors">
            <div class="container">
                <div class="section-head">
                    <h3>همکاران</h3>
                </div>
                <div class="swiper-container slider-two" dir="rtl">
                    <div class="swiper-wrapper">
                        @foreach($cooperators as $cooperator)
                            <div class="swiper-slide">
                                <a href="#">
                                    <img src="{{ url('storage/'.json_decode($cooperator->extra_value)->url) }}" alt="">
                                    <h4>{{ $cooperator->value }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
    @endif
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

        });

        selectSearch = '';
        $(document).on('change', '.select-search', function () {
            var targetElementSelect = $(this);
            if (targetElementSelect.find(':selected').val() != "") {
                selectSearch = targetElementSelect.find(':selected').attr('data-url')
            }
        });

        $(document).on('click', '.button-search-all', function () {
            if (selectSearch != '' && $('.search-input-all').val() != "") {
                window.location.href = selectSearch + '?title=' + $('.search-input-all').val()
            } else {
                window.location.reload()
            }
        })
    </script>
@endsection
