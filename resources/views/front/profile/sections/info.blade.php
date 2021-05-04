<form method="POST" action="{{ route('front.info.store') }}">
    <div class="tab-pane fade show active" id="user-info" role="tabpanel"
         aria-labelledby="user-info-tab">
        <div class="row flex-direction-column">
            @csrf
            <div class="col-12 col-md-5">
                <div class="user-image">
                    <img src="{{ auth()->guard('front')->user()->image ?
                            url('storage/'.auth()->user()->image):
                                asset('front/theme/assets/images/default-avatar.jpg')
                                  }}"
                         class="user-image__image" alt="">
                    <label for="userImageFile" class="user-image__label">تغییر عکس نمایه</label>
                    <input type="file" name="image" class="user-image__file" id="userImageFile">
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="text-input">
                    <label class="text-input__label">نام و نام خانوادگی <span class="text-danger">*</span></label>
                    <input type="text" class="text-input__input" name="name" value="{{ $info->name }}">
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="text-input">
                    <label class="text-input__label"> نام کاربری <span class="text-danger">*</span></label>
                    <input type="text" class="text-input__input" name="username" value="{{ $info->username }}">
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
                            <option @if($key == $info->degree) selected @endif value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">درجه ی علمی</label>
                    </div>
                    <select type="text" class="text-input__input" name="scientific_rank">
                        <option value>انتخاب نمایید...</option>
                        @foreach($scientific_rank as $raknKey=>$rankValue)
                            <option @if($raknKey == $info->scientific_rank) selected @endif value="{{ $raknKey }}">{{ $rankValue }}</option>
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
                    <input type="text" class="text-input__input" name="website" value="{{ $info->website }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="checkbox" name="as_creator" @if($info->as_creator) checked @endif value="1">
                    <label>ثبت به عنوان نویسنده</label>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="form-group">
                    <button type="button" class="btn btn-warning edit-profile">ویرایش اطلاعات کاربر</button>
                </div>
            </div>
        </div>
    </div>
</form>
