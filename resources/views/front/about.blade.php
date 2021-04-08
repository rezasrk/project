<!DOCTYPE html>
<html lang="en">

@include('front.profile.partials.header')

<body>
<header class="header-user">

    <div class="container">
        @include('front.profile.partials.top')
    </div>

</header>
<section class="user-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <section class="user-page user-articles">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-style-2">
                                        <div class="page-style-2__title">
                                            <h3>درباره ما</h3>
                                        </div>
                                        <div class="page-style-2__content">
                                            {!! $description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.layouts.footer')
@include('layouts.script')
</body>
