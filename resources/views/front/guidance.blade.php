<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.profile.partials.header')
    <title>راهنمای سایت</title>
</head>
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
                                            <h3>راهنمای سایت</h3>
                                        </div>
                                        <div class="page-style-2__content">
                                            @foreach($guidances as $guidance)
                                            <div class="row mt-4">
                                                <div class="col-md-12 mt-2">
                                                   <p>{{ $loop->iteration.' ) ' }} {{ $guidance->subject }}</p>
                                                </div>
                                                <hr>
                                                <div class="col-md-12 mt-2">
                                                    {{ $guidance->description}}
                                                </div>

                                                @if($guidance->path)
                                                    <div class="col-md-12 mt-2">
                                                        <img width="100%" class="help-block" src="{{ url('storage/'.$guidance->path) }}">
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
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
