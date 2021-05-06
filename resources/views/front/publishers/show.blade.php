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
                                    <h2 class="head-main__title">{{ $publisher->title }}</h2>
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
                            <div class="side__user-info">
                                <div class="side__user-info_img2">
                                    @if($publisher->image)
                                        <img src="{{ url('storage/'.$publisher->image) }}" alt="">
                                    @else
                                        <img src="{{ asset('front/theme/assets/images/mehr.png') }}" alt="">
                                    @endif
                                </div>

                                <div style="text-align: center;font-size: 16;">
                                    <h3>{{ $publisher->title }}</h3>
                                    <h5>تعداد مجلات ({{ $publisher->journals()->get()->count() }})</h5>
                                    <h5>تعداد شماره ها ({{ $publisher->journalNumbers()->get()->count() }})</h5>
                                    <h5>تعداد کل مقالات ({{ $publisher->articles()->get()->count() }})</h5>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-8">
                        <section class="main-section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="publisher">

                                        <div class="publisher__item">
                                            <h4>آدرس</h4>
                                            <p>{{ $publisher->address }}</p>
                                        </div>

                                        <div class="publisher__item">
                                            <h4>تلفن</h4>
                                            <p>{{ $publisher->phone }}</p>
                                        </div>

                                        <div class="publisher__item">
                                            <h4>پست الکترونیک</h4>
                                            <p>{{ $publisher->email }}</p>
                                        </div>

                                        <div class="publisher__item">
                                            <h4>آدرس اینترنتی</h4>
                                            <p>{{ $publisher->web_site }}</p>
                                        </div>

                                        <div class="publisher__item">
                                            <h4>درباره ناشر</h4>
                                            <p>{{ $publisher->about  }}</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <br>
                                    <div class="section-head">
                                        <h3>لیست مجلات</h3>
                                    </div>
                                    @foreach($journals as $journal)
                                        <div class="list-style__2">
                                            <div class="list-style__2_item">
                                                @if($journal->image)
                                                    <img src="{{ url('storage/'.$journal->image) }}"
                                                         alt="">
                                                @else
                                                    <img src="{{ asset('front/theme/assets/images/mehr.png') }}" alt="">
                                                @endif
                                                <div class="list-style__2_item__detail">
                                                    <div>
                                                        <h4>نام مجله: </h4>
                                                        <h5>{{ $journal->journal_title }}</h5>
                                                    </div>
                                                    <div>
                                                        <h4>تعداد مقاله: </h4>
                                                        <h5>{{ $journal->articles()->get()->count() }}</h5>
                                                    </div>
                                                    <div>
                                                        <h4>تعداد شمارگان: </h4>
                                                        <h5>{{ $journal->journalNumbers()->get()->count() }}</h5>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
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
