<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.profile.partials.header')
    <title>مجلات</title>
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
                                    <h2 class="head-main__title">مجلات</h2>
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
                                            <h5><a href="#">{{ $category->title }}</a></h5>
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
                                        <strong>{{ ($journals->currentPage() - 1) * $journals->perPage() + 1 }}</strong>
                                        تا
                                        <strong>{{ ($journals->currentPage() - 1) * $journals->perPage() + $journals->total() }}</strong>
                                        مورد از کل
                                        <strong>{{ $journals->total() }}</strong>
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
                                        @foreach ($journals as $journal)
                                            <div class="list-style__2_item">
                                                @if($journal->image)
                                                    <img width="100px" height="100px"
                                                         src="{{ url('storage/'.$journal->image) }}" alt="">
                                                @else
                                                    <img src="{{ asset('front/theme/assets/images/mehr.png') }}" alt="">
                                                @endif
                                                <div class="list-style__2_item__detail">
                                                    <div>
                                                        <h4>عنوان مجله: </h4>
                                                        <h5>
                                                            <a class="text-green"
                                                               href="{{ route('front.page.publisher.show',$journal->id) }}">
                                                                {{ $journal->journal_title }}
                                                            </a></h5>
                                                    </div>
                                                    <div>
                                                        <h4>ناشر :</h4>
                                                        <h5>  {{ optional($journal->publish)->title }}</h5>
                                                    </div>
                                                    <div>
                                                        <h4>تعداد مقاله :</h4>
                                                        <h5>  {{ $journal->articleCount }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {!! $journals->appends(request()->query())->render() !!}
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
