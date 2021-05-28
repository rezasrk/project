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
                                    <h2 class="head-main__title">پدیدآورندگان</h2>
                                    <span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-2"></div>

                        </div>

                    </div>
                    <div class="col-12 col-sm-6 col-lg-2 order_lg_1">
                        <aside class="side-right side article-side">
                            <div class="side__options">
                                <h3 class="side__options_title">حوضه های تخصصی</h3>
                                <div class="side__options_items">
                                    @foreach($categories as $category)
                                        <div class="side__options_item">
                                            <h5>
                                                <a href="{{ request()->query() ? request()->fullUrl().'&category_id='.$category->id : request()->url().'?category_id='.$category->id }}">
                                                    {{ $category->title }}
                                                </a>
                                            </h5>
                                            <span>{{ $category->journalCount }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                @if(!request()->query() || request()->query('limit_cat') == 10)
                                    <a href="{{ request()->url().'?limit_cat=20' }}" class="side__options_get-all">نمایش
                                        بیشتر</a>
                                @else
                                    <a href="{{ request()->url().'?limit_cat=10' }}" class="side__options_get-all">نمایش
                                        کمتر</a>
                                @endif

                            </div>
                        </aside>
                    </div>

                    <div class="col-8">

                        <section class="main-section">
                            <div class="search-box-2">
                                <form method="GET">
                                    <input name="title" value='{{ request()->query('title') }}' type="text"
                                           placeholder="{{ $searchPlaceHolder }}"/>
                                    <button>
                                        <img src="{{ asset('front/theme/assets/images/icon/search-icon-white.svg') }}"
                                             alt="" srcset="">
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
                                        <a href="{{ request()->url().'?sort=created_at-desc' }}"
                                           @if(request()->query('sort') == 'created_at-desc') class='active' @endif >جدیدترین</a>|
                                        <a href="{{ request()->url().'?sort=created_at-asc' }}"
                                           @if(request()->query('sort') == 'created_at-asc') class='active' @endif>قدیمی
                                            ترین</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="articles">
                                        @foreach ($users as $user)
                                            <div class="list-style__2_item">
                                                @if($user->image)
                                                    <img width="100px" height="100px"
                                                         src="{{ url('storage/'.$user->image) }}" alt="">
                                                @else
                                                    <img
                                                        src="{{ asset('front/theme/assets/images/default-avatar.jpg') }}"
                                                        alt="">
                                                @endif
                                                <div class="list-style__2_item__detail">
                                                    <div>
                                                        <h4>عنوان پدید آورنده: </h4>
                                                        <h5>
                                                            <a class="text-green"
                                                               href="{{ route('front.creator.show',$user->id) }}">
                                                                {{ $user->name }}
                                                            </a></h5>
                                                    </div>
                                                    <div>
                                                        <h4>تعداد مقالات :</h4>
                                                        <h5>  {{ $user->articleCount }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {!! $users->appends(request()->query())->render() !!}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-2">
                        @include('front.advertising')
                    </div>

                </div>

            </div>
        </div>
    </main>
</section>
@include('front.layouts.footer')
@include('layouts.script')
</body>
