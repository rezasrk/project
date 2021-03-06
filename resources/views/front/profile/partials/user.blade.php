<form action="{{ route('profile') }}">
<div class="tab-pane fade show active" id="user-info" role="tabpanel"
     aria-labelledby="user-info-tab">
    <div class="row flex-direction-column">

        <div class="col-12 col-md-5">
            <div class="user-image">
                <img src="{{ asset('front/theme/assets/images/default-avatar.jpg') }}"
                     class="user-image__image" alt="">
                <label for="userImageFile" class="user-image__label">تغییر عکس نمایه</label>
                <input type="file" class="user-image__file" id="userImageFile">
            </div>
        </div>

        <div class="col-12 col-md-5">
            <div class="text-input">
                <label class="text-input__label">نام و نام خانوادگی</label>
                <input type="text" class="text-input__input" name="name" value="{{ $info->name }}">
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">مدرک تحصیلی</label>
                </div>
                <select type="text" class="text-input__input" name="degree">
                    <option value>انتخاب نمایید...</option>
                    @foreach($degree as $key=>$value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-5">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">رتبه علمی</label>
                </div>
                <select type="text" class="text-input__input" name="scientific_rank">
                    <option value>انتخاب نمایید...</option>
                    @foreach($scientific_rank as $keyRank=>$valueRank)
                        <option value="{{ $keyRank }}">{{ $valueRank }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-5">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">پست الکترونیک</label>
                </div>
                <input type="text" class="text-input__input" name="email" value="{{ $info->email }}">
            </div>
        </div>

        <div class="col-12 col-md-5">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">وب سایت شخصی</label>
                </div>
                <input type="text" class="text-input__input" name="web_site">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-warning edit-profile">ویرایش اطلاعات کاربر</button>
            </div>
        </div>
    </div>
</div>
