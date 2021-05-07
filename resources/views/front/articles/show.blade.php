<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.profile.partials.header')
    <title>مقاله </title>
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
                                    <h2 class="head-main__title"></h2>
                                    <span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-2"></div>

                        </div>

                    </div>
                    <div class="col-2">
                        <aside class="side-right side article-side">
                            <div class="side__user-info">
                                <div class="side__user-info_img2">
                                    @if($journal->image)
                                        <img src="{{ url('storage/'.$journal->image) }}" alt="">
                                    @else
                                        <img src="{{ asset('front/theme/assets/images/mehr.png') }}" alt="">
                                    @endif
                                </div>

                                <div>
                                    <h5>عنوان مجله: </h5>
                                    <h4>{{ $journal->journal_title }}</h4>
                                </div>

                            </div>

                            <div class="side__options">
                                <div class="side__options_head">
                                    <h3 class="side__options_title">آرشیو شماره ها</h3>
                                    {{--                                    <span class="side__options_head__num">32</span>--}}
                                </div>
                                <div class="accordion accordion-side" id="accordionExample">
                                    @foreach($years as $year)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#{{ str_repeat('sss',$loop->iteration) }}"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                    سال {{ $year->year }}
                                                </button>
                                            </h2>
                                            <div id="{{ str_repeat('sss',$loop->iteration) }}"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul>
                                                        @foreach($journal->journalNumbers()->where('year',$year->year)->limit(10)->get() as $number)
                                                            <li>
                                                                <a href="{{ route('front.page.article').'?journal_id='.$journal->id.'&num='.$number->id }}">
                                                                    {{ $number->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if(!request()->query('limit') || request()->query('limit') == 10)
                                    <a href="{{ request()->url().'?limit=20&journal_id='.request()->query('journal_id') }}"
                                       class="side__options_get-all">نمایش
                                        بیشتر</a>
                                @else
                                    <a href="{{ request()->url().'?limit=10&journal_id='.request()->query('journal_id') }}"
                                       class="side__options_get-all">نمایش
                                        کمتر</a>
                                @endif
                            </div>


                        </aside>
                    </div>

                    <div class="col-8">

                        <section class="main-section">
                            <br>
                            <br>

                            <div class="row">
                                <div class="col-12">
                                    <div class="articles__item">
                                        <h3 class="articles__item_title">
                                            {{ $article->title }}
                                        </h3>
                                        <h4 class="articles__item_othors">
                                            <strong>نویسنده:</strong>
                                            @foreach($writers as $writer)
                                                {{ $writer->name.'/' }}
                                            @endforeach
                                        </h4>
                                        <h4 class="articles__item_source">
                                            <strong>منبع:</strong>
                                            @foreach($num as $n)
                                                {{ $n->title.'/' }}
                                            @endforeach
                                        </h4>
                                        <h4>
                                            <strong>کلید واژه:</strong>
                                            <br>
                                            <br>
                                            @foreach($tags as $tag)
                                            {{ $tag->title.' - ' }}
                                                @endforeach
                                        </h4>

                                        <h4>
                                            <strong>حوزه های تخصصی:</strong>
                                            <br>
                                            <br>
                                            @foreach($categories as $category)
                                                {{ $category->title }} &gt;
                                            @endforeach
                                        </h4>

                                        <div class="articles__item_footer">
                                            <p class="articles__item_footer__text">
                                                <strong>تعداد بازدید:</strong>
                                                <span>{{ $article->viewCount }}</span> | <strong>تعداد
                                                    دانلود</strong> <span>{{ $article->downloadCount }}</span>
                                            </p>
                                            <a href="{{ route('article.download')."?article_id={$article->id}&path=".optional($article->attachments()->first())->path }}" class="articles__item_footer__btn">
                                                <img src="{{ asset('front/theme/assets/images/icon/download-icon.svg') }}"> دانلود
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <br>

                                    <div class="short-text">
                                        <h4 class="short-text__title">چکیده: </h4>
                                        <p class="short-text__text">
                                            {{ $article->article_summery }}
                                        </p>
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
