<div class="tab-pane fade auth-content__signup" id="signup" role="tabpanel"
     aria-labelledby="signup-tab">
    <h3 class="auth-content__title">
        اگر حساب کاربری دارید، وارد شوید
    </h3>

    <form class="auth-content__form" action="{{ route('register') }}" method="post">
        <div class="auth-content__text-input">
            <label for="signupUserName">نام و نام خانوادگی</label>
            <input type="text" id="signupUserName" name="name">
        </div>
        <div class="auth-content__text-input">
            <label for="signupEmailAddress">پست الکترونیک</label>
            <input type="text" id="signupEmailAddress" name="email">
        </div>
        <div class="auth-content__text-input">
            <label for="signupPassword">گذرواژه</label>
            <input type="password" id="signupPassword" name="password">
        </div>
        <div class="auth-content__text-input">
            <label for="signupPassword">تکرار گذرواژه</label>
            <input type="password" id="signupPassword" name="passwordConfirmation">
        </div>
        <div class="form-check" style="margin-bottom: 10px;">
            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="accept_rules">
            <label class="form-check-label" for="flexCheckDefault">
                <a href="#">قوانین</a> و <a href="#">مقررات</a> سایت را می پذیرم
            </label>
        </div>

        <button type="button" class="auth-content__form_btn register">عضویت</button>
    </form>
</div>
