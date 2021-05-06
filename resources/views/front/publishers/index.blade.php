<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.profile.partials.header')
    <title>ناشران</title>
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
                                    <h2 class="head-main__title">ناشران</h2>
                                    <span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-2"></div>

                        </div>

                    </div>
                    <div class="col-2">
                        {{-- <aside class="side-right side">
                            <div class="side__options">
                                <h3 class="side__options_title">حوزه های تخصصی</h3>
                                <div class="side__options_items">

                                    <div class="side__options_item">
                                        <h5><a href="#">تاریخ</a></h5>
                                        <span>1</span>
                                    </div>
                                </div>

                            </div>
                        </aside> --}}
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
                                        <strong>{{ ($publishers->currentPage() - 1) * $publishers->perPage() + 1 }}</strong>
                                        تا
                                        <strong>{{ ($publishers->currentPage() - 1) * $publishers->perPage() + $publishers->total() }}</strong>
                                        مورد از کل
                                        <strong>{{ $publishers->total() }}</strong>
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
                                        @foreach ($publishers as $publisher)
                                        <div class="list-style__2_item">
                                            @if($publisher->image)   
                                                <img width="100px" height="100px" src="{{ url('storage/'.$publisher->image) }}" alt="">
                                            @else 
                                                <img src="{{ asset('front/theme/assets/images/mehr.png') }}" alt="">
                                            @endif
                                            <div class="list-style__2_item__detail">
                                                <div>
                                                    <h4>عنوان ناشر: </h4>
                                                    <h5>{{ $publisher->title }}</h5>
                                                </div>

                                                <div>
                                                    <h4>تعداد مجلات: </h4>
                                                    <h5>  {{ $publisher->journalCount }}</h5>
                                                </div>

                                                <div>
                                                    <h4>تعداد شماره ها: </h4>
                                                    <h5>{{ $publisher->nmCount }}</h5>
                                                </div>

                                                <div>
                                                    <h4>تعداد کل مقالات: </h4>
                                                    <h5>{{ $publisher->articleCount }}</h5>
                                                </div>



                                            </div>
                                        </div>
                                        @endforeach
                                    {!! $publishers->appends(request()->query())->render() !!}
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
