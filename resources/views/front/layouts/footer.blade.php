<footer class="footer">

    <div class="footer__nav">
        <div class="container">

            <ul class="footer__nav_items">

                <li class="footer__nav_item">
                    <a href="{{ route('front.about') }}">درباره ما</a>
                </li>
                <li class="footer__nav_item">
                    <a href="{{ route('front.rule') }}">قوانین</a>
                </li>
                <li class="footer__nav_item">
                    <a href="">تماس با ما</a>
                </li>
                <li class="footer__nav_item">
                    <a href="#">راهنمای سایت</a>
                </li>
                <li class="footer__nav_item">
                    <a href="#">شورای برسی متون</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="footer__grid">
            <p>© کلیه حقوق متعلق به پژوهشگاه علوم انسانی و مطالعات فرهنگی می‌باشد.</p>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-auth" id="modalAuth" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <ul class="nav nav-tabs auth-nav" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                               aria-controls="login" aria-selected="true">ورود</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup" role="tab"
                               aria-controls="signup" aria-selected="false">عضویت</a>
                        </li>

                    </ul>

                    <div class="tab-content auth-content">
                        @include('front.user.login')
                        @include('front.user.register')
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer>

<script src="{{ asset('front/theme/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('front/theme/assets/js/bootstrap.bundle.min.js')  }}"></script>
<script src="{{ asset('front/theme/assets/js/bootstrap-filestyle.min.js')  }}"></script>
<script src="{{ asset('front/theme/assets/js/main.js')  }}"></script>
<script src="{{ asset('front/theme/assets/font-awesome/all.min.js')  }}"></script>
<script src="{{ asset('front/theme/assets/js/swiper-bundle.min.js') }}"></script>

@include('layouts.script')

<script>
    var swiper = new Swiper('.category-slider', {
        slidesPerView: 4,

        breakpoints: {
            280: {
                slidesPerView: 1,
                spaceBetween: 15
            },
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
            }
        }

    });
    var swiper = new Swiper('.slider-two', {
        slidesPerView: 4,
        loop: true,
        spaceBetween: 30,
        breakpoints: {
            200: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 480px
            550: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40
            }
        }
    });

    var swiper = new Swiper('.journals-slider', {
        pagination: {
            el: '.swiper-pagination',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: 6,
        loop: true,
        spaceBetween: 25,
        breakpoints: {
            280: {
                slidesPerView: 1,
                spaceBetween: 15
            },
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            // when window width is >= 640px
            550: {
                slidesPerView: 4,
            },

            768: {
                slidesPerView: 5,
            },
            992: {
                slidesPerView: 6,
            }
        }
    });

    var swiper = new Swiper('.publishers-slider', {

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        // autoplay: {
        //     delay: 5000,
        //     disableOnInteraction: false,
        // },
        // loop: true,
        spaceBetween: 10,
        breakpoints: {

            280: {
                slidesPerView: 1,
            },

            550: {
                slidesPerView: 2,
            },
            720: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            },

            1200: {
                slidesPerView: 4,
            }
        }
    });

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
