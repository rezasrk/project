<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.profile.partials.header')
    <title>پروفایل</title>
</head>
<body>
<header class="header-user">

    <div class="container">
        @include('front.profile.partials.top')
    </div>

</header>

<section class="user-page">

    <div class="container">
        @include('front.profile.partials.navbar')
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    @include('front.profile.sections.'.$type)
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.layouts.footer')
@include('layouts.script')
</body>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
    $(document).on('click', '.edit-profile', function () {
        targetElement = $(this);
        buttonLoading(targetElement);
        httpFormPostRequest(targetElement).done(function (response) {
            if (response.status === 200) {
                successAlert(response.msg);
                setTimeout(function () {
                    window.location.reload()
                }, 2000);
            }
            buttonRemoveLoading(targetElement);
        });
    });

    $(document).on('click', '.publisher-store', function () {
        targetElement = $(this);
        buttonLoading(targetElement);
        httpFormPostRequest(targetElement).done(function (response) {
            if (response.status === 200) {
                successAlert(response.msg);
                setTimeout(function () {
                    window.location.reload()
                }, 2000);
            }
            buttonRemoveLoading(targetElement);
        });
    });


    $(document).on('click', '.store-info', function () {
        targetElement = $(this);
        buttonLoading(targetElement);
        httpFormPostRequest(targetElement).done(function (response) {
            if (response.status === 200) {
                successAlert(response.msg);
                setTimeout(function () {
                    window.location.reload();
                }, 2000)
            }
            buttonRemoveLoading(targetElement);
        })
    });

    $(document).on('change', '.select-journal', function () {
        httpGetRequest($(this).find(':selected').attr('data-url')).done(function (response) {
            if (response.status === 200) {
                $('.show-number-journal').html(response.data)
            }
        })
    });

    $(document).on('change', '.select-first-category', function () {
        changeCategory($(this), 'select-second-category')
    });

    $(document).on('change', '.select-second-category', function () {
        changeCategory($(this), 'select-third-category')
    });

    $(document).on('change', '.select-third-category', function () {
        changeCategory($(this), 'select-firth-category')
    });

    function changeCategory(targetSelectElelemt, targetClass) {
        httpGetRequest("{{ route('getCategoryChild').'?parent_id=' }}" + targetSelectElelemt.find(':selected').val()).done(function (response) {
            if (response.status === 200) {
                $(targetSelectElelemt).closest('.row').find('.' + targetClass).html(response.data)
            }
        })
    }

    categoryHtml = $('.sample-category').html();

    $(document).on('click', '.add-category-form', function (e) {
        e.preventDefault();
        $('.sample-category:last').after("<div class='row sample-category'>" + categoryHtml + "</div>");
    });
</script>
</html>
