<div class="tab-pane fade show active auth-content__login" id="login" role="tabpanel"
     aria-labelledby="login-tab">
    <h3 class="auth-content__title">
        اگر حساب کاربری ندارید، عضو شوید
    </h3>

    <form class="auth-content__form" action="{{ route('front.login') }}">
        @csrf
        <div class="auth-content__text-input">
            <label for="loginEmailAddress">ایمیل خود را وارد کنید</label>
            <input type="text" id="loginEmailAddress" name="username">
        </div>
        <div class="auth-content__text-input">
            <label for="loginPassword">گذرواژه ی خود را وارد کنید</label>
            <input type="password" id="loginPassword" name="password">
        </div>

        <button type="button" class="auth-content__form_btn login">ورود</button>
    </form>
</div>
