<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.profile.partials.header')
    <title>مجله</title>
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
                                    <h2 class="head-main__title">{{ $journal->journal_title }}</h2>
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
                                    @if($journal->image)
                                        <img src="{{ 'storage/'.$journal->image }}" alt="">
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
                                                                <a href="#">
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
                                    <a href="{{ request()->url().'?limit=20' }}" class="side__options_get-all">نمایش
                                        بیشتر</a>
                                @else
                                    <a href="{{ request()->url().'?limit=10' }}" class="side__options_get-all">نمایش
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
                                    <div class="jurnal">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>دسته بندی موضوعی:</strong>

                                                    <span>
                                                        {{ optional($journal->category)->title }}
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>درجه علمی:</strong>

                                                    <span>
                                                        {{ optional($journal->degree()->first())->value }}
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>دوره انتشار:</strong>

                                                    <span>
                                                        {{ optional($journal->period)->value }}
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>تاریخ آغاز به کار:</strong>

                                                    <span>
                                                        {{ $morilog->gregorianToJalali($journal->created_at) }}
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>ناشر:</strong>

                                                    <span>
                                                        {{ optional($journal->publish)->title }}
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>صاحب امتیاز:</strong>

                                                    <span>
                                                        {{ $journal->owner_journal }}
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>مدیر مسئول:</strong>

                                                    <span>
                                                        {{ $journal->manager }}
                                                    </span>
                                                </h4>

                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>سردبیر:</strong>

                                                    <span>
                                                        {{ $journal->chief_editor }}
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="col-md-12">
                                                <h4 class="jurnal__text">
                                                    <strong>هیئت تحریریه:</strong>

                                                    <p>
                                                        {{ $journal->editorial_board }}
                                                    </p>
                                                </h4>

                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>تلفن:</strong>

                                                    <span>
                                                        {{ $journal->phone }}
                                                    </span>
                                                </h4>

                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>فکس:</strong>

                                                    <span>
                                                        {{ $journal->fax }}
                                                    </span>
                                                </h4>

                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>P-issn:</strong>

                                                    <span>
                                                        {{ $journal->p_issn }}
                                                    </span>
                                                </h4>

                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>e-issn:</strong>

                                                    <span>
                                                        {{ $journal->e_issn }}
                                                    </span>
                                                </h4>

                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>پست الکترونیک:</strong>

                                                    <span>
                                                        {{ $journal->email }}
                                                    </span>
                                                </h4>

                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="jurnal__text">
                                                    <strong>وب سایت:</strong>

                                                    <span>
                                                       {{ $journal->web_site }}
                                                    </span>
                                                </h4>

                                            </div>

                                            <div class="col-md-12">
                                                <h4 class="jurnal__text">
                                                    <strong>آدرس:</strong>

                                                    <p>
                                                       {{ $journal->address }}
                                                    </p>
                                                </h4>

                                            </div>

                                            <div class="col-md-12">
                                                <h4 class="jurnal__text">
                                                    <strong>کد پستی:</strong>

                                                    <p>
                                                        {{ $journal->post_code }}
                                                    </p>
                                                </h4>

                                            </div>

                                            <div class="col-md-12">
                                                <h4 class="jurnal__text">
                                                    <strong>درباره مجله:</strong>

                                                    <p>
                                                       {{ $journal->about_journal }}
                                                    </p>
                                                </h4>

                                            </div>

                                        </div>


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
