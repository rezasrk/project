<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.profile.partials.header')
    <title>تماس با ما</title>
</head>
<body>
<header class="header-user">

    <div class="container">
        @include('front.profile.partials.top')
    </div>

</header>
<section class="user-page user-articles">

    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="page-style-2 contact-page">
                    <div class="page-style-2__title">
                        <h3>تماس با ما</h3>
                    </div>
                    <div class="page-style-2__content">
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="contact-page__info">
                                        <div class="contact-page__info_item">

                                            <p><i class="fas fa-map-marker-alt"></i> {{ $address->value }}</p>
                                        </div>
                                        <div class="contact-page__info_item">
                                            <p><i class="fas fa-at"></i>پست الکترونیک</p>

                                            <span>{{ $email->value }}</span>
                                        </div>
                                        <div class="contact-page__info_item">

                                            <p><i class="fas fa-phone-square"></i>تلفن تماس</p>
                                            <span>{{ $phone->value }}</span>
                                        </div>

                                        <div class="contact-page__info_item">

                                            <p><i class="fas fa-envelope"></i>کد پستی</p>
                                            <span>{{ $post_code->value }}</span>
                                        </div>

                                        <div class="contact-page__info_item">

                                            <p>ساعات پاسخگویی</p>
                                            <span>{{ $hours->value }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <p>نام و نام خانوادگی</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-input">
                                                <input name="name" type="text" class="text-input__input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <p>پست الکترونیک</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-input">
                                                <input name="email" type="text" class="text-input__input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <p>تلفن</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-input">
                                                <input name="mobile" type="text" class="text-input__input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <p>موضوع</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-input">
                                                <input name="subject" type="text" class="text-input__input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <p>متن پیام</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-input">
                                                <textarea name="message" type="text" class="text-input__input"
                                                          style="height: 150px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label>{{ trans('validation.attributes.captcha') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <i class="text-danger" onclick="refreshCaptcha()"></i>
                                            <input type="text" name="captcha" autocomplete="off"
                                                   class="text-input__input text-left">
                                            <div class="captcha mt-1">
                                                {!! captcha_img() !!}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <button class="btn-block button-primary send-message" type="button">ارسال</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
@include('front.layouts.footer')
@include('layouts.script')
<script>
    $(document).on('click', '.send-message', function () {
        var targetElementClick = $(this)
        buttonLoading(targetElementClick);

        httpFormPostRequest(targetElementClick).done(function (response) {
            if (response.status === 200) {
                successAlert(response.msg)
                setTimeout(function () {
                    window.location.reload()
                }, 2000)
            }
            buttonRemoveLoading(targetElementClick)
        })
    });
</script>
</body>
