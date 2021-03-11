<div class="user-page__nav">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="{{ route('front.profile','user') }}" class="user-page__nav_link {{ (route('front.profile')) == request()->url()  ? 'active' : '' }}" type="button" >ویرایش اطلاعات</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('front.publisher') }}" class="user-page__nav_link {{ (route('front.publisher')) == request()->url()  ? 'active' : '' }}" type="button">ثبت اطلاعات نشریه</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('front.journal') }}" class="user-page__nav_link {{ (route('front.journal')) == request()->url()  ? 'active' : '' }}" type="button">مجله ها</a>
        </li>
    </ul>

</div>
