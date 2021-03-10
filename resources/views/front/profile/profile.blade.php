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
    $(document).on('click', '.edit-profile', function () {
        targetElement = $(this);
        buttonLoading(targetElement);
        httpFormPostRequest(targetElement).done(function (response) {
            if (response.status === 200) {
                successAlert(response.msg);
                setTimeout(function(){
                    window.location.reload()
                },2000);
            }
            buttonRemoveLoading(targetElement);
        });
    });

     $(document).on('click','.publisher-store',function(){
         targetElement = $(this);
         buttonLoading(targetElement);
         httpFormPostRequest(targetElement).done(function(response){
             if (response.status === 200) {
                 successAlert(response.msg);
                 setTimeout(function(){
                     window.location.reload()
                 },2000);
             }
             buttonRemoveLoading(targetElement);
         });
     });
</script>
</html>
