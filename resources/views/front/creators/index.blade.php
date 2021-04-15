<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.profile.partials.header')
    <title>پدید آورندگان</title>
</head>
<body>
<header class="header-user">

    <div class="container">
        @include('front.profile.partials.top')
    </div>

</header>
<section class="user-page">
    <main>

        <div class="pages">

            <div class="container">

                <div class="row">
                    <div class="col-12">

                        <div class="row">

                            <div class="col-2"></div>

                            <div class="col-8">
                                <div class="head-main">
                                    <h2 class="head-main__title">پدید آورندگان</h2>
                                    <span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-2"></div>

                        </div>

                    </div>
                    <div class="col-2">
                        <aside class="side-right side">
                            <div class="side__options">
                                <h3 class="side__options_title">حوزه های تخصصی</h3>
                                <div class="side__options_items">

                                    <div class="side__options_item">
                                        <h5><a href="#">تاریخ</a></h5>
                                        <span>1</span>
                                    </div>
                                </div>

                            </div>
                        </aside>
                    </div>

                    <div class="col-8">

                        <section class="main-section">
                            <div class="search-box-2">
                                <form method="GET">
                                    <input name="title" value='{{ request()->query('title') }}' type="text" placeholder="{{ $searchPlaceHolder }}" />
                                    <button>
                                        <img src="{{ asset('front/theme/assets/images/icon/search-icon-white.svg') }}" alt="" srcset="">
                                    </button>
                                </form>
                                <div class="search-box-2__grid">
                                    <p class="search-box-2__text">
                                        نمایش
                                        <strong>{{ ($users->currentPage() - 1) * $users->perPage() + 1 }}</strong>
                                        تا
                                        <strong>{{ ($users->currentPage() - 1) * $users->perPage() + $users->total() }}</strong>
                                        مورد از کل
                                        <strong>{{ $users->total() }}</strong>
                                        مورد
                                    </p>
                                    <div class="search-box-2__links">
                                        <a href="{{ request()->url().'?sort=created_at-desc' }}" @if(request()->query('sort') == 'created_at-desc') class='active'  @endif >جدیدترین</a>|
                                        <a href="{{ request()->url().'?sort=created_at-asc' }}" @if(request()->query('sort') == 'created_at-asc') class='active'  @endif>قدیمی ترین</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="articles">
                                        @foreach ($users as $user)
                                        <div class="articles__item">
                                            @if($user->image)
                                                <img width="100px" height="100px" src="{{ url('storage/'.$user->image) }}" alt="" class="side__user-info_img">
                                            @else
                                                <img width="100px" height="100px" src='{{ asset("front/theme//assets/images/default-avatar.jpg") }}' alt="" class="side__user-info_img">
                                            @endif
                                            <h3 class="articles__item_title">
                                                پدید آورنده : <strong>{{ $user->name }}</strong>
                                            </h3>
                                            <h4 class="articles__item_othors">
                                                <strong>تعداد مقالات : </strong>
                                            {{ $user->articleCount }}
                                            </h4>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-2">
                        <div class="side__options">
                            <h3 class="side__options_title">درجه علمی</h3>
                            <div class="side__options_items">

                                <div class="side__options_item">
                                    <h5><a href="#">علمی پژوهشی</a></h5>
                                    <span>1</span>
                                </div>
                                <div class="side__options_item">
                                    <h5><a href="#">علمی ترویجی</a></h5>
                                    <span>3</span>
                                </div>
                                <div class="side__options_item">
                                    <h5><a href="#">علمی پژوهشی (دانشگاه آزاد)</a></h5>
                                    <span>1</span>
                                </div>
                                <div class="side__options_item">
                                    <h5><a href="#">علمی پژوهشی</a></h5>
                                    <span>1</span>
                                </div>
                                <div class="side__options_item">
                                    <h5><a href="#">علمی ترویجی</a></h5>
                                    <span>3</span>
                                </div>
                            </div>
                        
                        </div>

                    </div>

                </div>

            </div>
</div>
    </main>
</section>
@include('front.layouts.footer')
@include('layouts.script')
</body>
