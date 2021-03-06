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
        @include('front.profile.partials.navbar')
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    @include('front.profile.partials.'.$type)
                </div>
            </div>
        </div>
    </div>
</section>

@include('front.profile.partials.footer')
</body>
<script>
    $(document).on('click','.edit-profile',function(){

    });
</script>
</html>
