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

                            <div class="col-lg-2"></div>

                            <div class="col-lg-8">
                                <div class="head-main">
                                    <h2 class="head-main__title">پدید آورندگان</h2>
                                    <span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-lg-2"></div>

                        </div>

                    </div>
                    <div class="col-12 col-sm-6 col-lg-2 order_lg_1">
                        <aside class="side-right side">
                            <div class="side__user-info">
                                @if($user->image)
                                    <img src="{{ url('storage/'.$user->image) }}" alt=""
                                         class="side__user-info_img">
                                @else
                                    <img src="{{ asset('front/theme/assets/images/default-avatar.jpg') }}" alt=""
                                         class="side__user-info_img">
                                @endif
                                <h3 class="side__user-info_title">{{ $user->name }}</h3>
                                <h4>
                                    تعداد کل مقالات: ({{ $user->articles()->count() }})
                                </h4>
                                <div>
                                    <h5>نام کاربری: </h5>
                                    <h4>{{ $user->name }}</h4>
                                </div>
                                <div>
                                    <h5>مدرک تحصیلی: </h5>
                                    <h4>{{ optional($user->userDegree)->value }}</h4>
                                </div>
                                <div>
                                    <h5>رتبه علمی: </h5>
                                    <h4>{{ optional($user->userScientificRank)->value }}</h4>
                                </div>
                                <div>
                                    <h5>پست الکترونیک: </h5>
                                    <h4>{{ $user->email }}</h4>
                                </div>
                                <div>
                                    <h5>وبسایت شخصی: </h5>
                                    <h4>{{ $user->website }}</h4>
                                </div>
                            </div>
{{--                            <div class="side__options">--}}
{{--                                <h3 class="side__options_title">درجه علمی</h3>--}}
{{--                                <div class="side__options_items">--}}

{{--                                    <div class="side__options_item">--}}
{{--                                        <h5><a href="#">علمی پژوهشی</a></h5>--}}
{{--                                        <span>1</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="side__options_item">--}}
{{--                                        <h5><a href="#">علمی ترویجی</a></h5>--}}
{{--                                        <span>3</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="side__options_item">--}}
{{--                                        <h5><a href="#">علمی پژوهشی (دانشگاه آزاد)</a></h5>--}}
{{--                                        <span>1</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="side__options_item">--}}
{{--                                        <h5><a href="#">علمی پژوهشی</a></h5>--}}
{{--                                        <span>1</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="side__options_item">--}}
{{--                                        <h5><a href="#">علمی ترویجی</a></h5>--}}
{{--                                        <span>3</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="side__options_get-all">نمایش بیشتر</a>--}}
{{--                            </div>--}}




                        </aside>
                    </div>

                    <div class="col-12 col-lg-8">

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
                                        <strong>{{ ($articles->currentPage() - 1) * $articles->perPage() + 1 }}</strong>
                                        تا
                                        <strong>{{ ($articles->currentPage() - 1) * $articles->perPage() + $articles->total() }}</strong>
                                        مورد از کل
                                        <strong>{{ $articles->total() }}</strong>
                                        مورد
                                    </p>
                                    <div class="search-box-2__links">
                                        <a href="{{ request()->url().'?sort=created_at-desc&journal_id='.request()->query('journal_id') }}"
                                           @if(request()->query('sort') == 'created_at-desc') class='active' @endif >جدیدترین</a>|
                                        <a href="{{ request()->url().'?sort=created_at-asc&journal_id='.request()->query('journal_id') }}"
                                           @if(request()->query('sort') == 'created_at-asc') class='active' @endif>قدیمی
                                            ترین</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="articles">
                                        @foreach ($articles as $article)
                                            <div class="articles__item">
                                                <a class="text-green" href="{{ route('front.page.article.show',$article->id).'?journal_id='.$article->journal_id }}">
                                                    <h3 class="articles__item_title">
                                                        عنوان : {{ $article->title }}
                                                    </h3>
                                                </a>
                                                <h6><strong>نویسنده / نویسندگان : </strong>
                                                    @foreach($article->writers as $writer)
                                                        {{ $writer->name.'/' }}
                                                    @endforeach
                                                </h6>
                                                <h3 class="articles__item_title">
                                                    <strong>کلید واژه :</strong>
                                                </h3>
                                                <h6>
                                                    @foreach($article->tags as $tag)
                                                        {{ $tag->title.'/' }}
                                                    @endforeach
                                                </h6>
                                                <h3 class="articles__item_title">
                                                    <strong>حوضه ی تخصصی :</strong>
                                                </h3>
                                                <h6>
                                                    @foreach($article->categories as $category)
                                                        {{ optional($category)->title.'/' }}
                                                    @endforeach
                                                </h6>
                                                <div class="articles__item_footer">
                                                    <p class="articles__item_footer__text">
                                                        <strong>تعداد بازدید:</strong>
                                                        <span>{{ $article->viewCount }}</span> | <strong>تعداد
                                                            دانلود</strong> <span>{{ $article->downloadCount }}</span>
                                                    </p>
                                                    <a href="{{ route('article.download')."?article_id={$article->id}&path=".optional($article->attachments()->first())->path }}"
                                                       class="articles__item_footer__btn">
                                                        <img
                                                            src="{{ asset('front/theme//assets/images/icon/download-icon.svg') }}"/>
                                                        دانلود
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                        {!! $articles->appends(request()->query())->render() !!}
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
