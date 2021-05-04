<form method="POST" action="{{ route('front.publisher.store') }}">
@csrf
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">عنوان نشریه<span class="text-danger">*</span></label>
                        </div>
                        <input type="text" name="title" class="text-input__input" value="{{ optional($publish)->title }}">
                        <input type="hidden" name="publisher_id" value="{{ optional($publish)->id }}">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">آدرس</label>
                        </div>
                        <input type="text" name="address" class="text-input__input" value="{{ optional($publish)->address }}">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">تلفن تماس</label>
                        </div>
                        <input type="text" nam='phone' class="text-input__input" value="{{ optional($publish)->phone }}">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">پست الکترونیکی</label>
                        </div>
                        <input type="text" name="email" class="text-input__input" value="{{ optional($publish)->email }}">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">آدرس اینترنتی</label>
                        </div>
                        <input type="text" name="web_site" class="text-input__input" value="{{ optional($publish)->web_site }}">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">درباره ناشر</label>
                        </div>
                        <textarea name="about" type="text" class="text-input__input" style="height:100px">{{ optional($publish)->about }}</textarea>
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">بارگزاری تصویر مجوز انتشار<span class="text-danger">*</span></label>
                        </div>
                        <input name="license" type="file" class="text-input__file"
                            data-buttonText="find" data-placeholder="No file">
                        @if(optional($publish)->license)
                            <img width="100px" height="100px" src="{{ url('storage/'.$publish->license) }}" alt="">
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">نامه درخواست (نامه رسمی)<span class="text-danger">*</span></label>
                        </div>
                        <input name='letter' type="file" class="text-input__file"
                            data-buttonText="find" data-placeholder="No file">
                        @if(optional($publish)->letter)
                            <img width="100px" height="100px" src="{{ url('storage/'.$publish->letter) }}" alt="">
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <br />
                    <button type="button" class="button-primary publisher-store">ثبت نشریه</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label for="JournalsImageUp" class="Journals-panel__image">
                <div class="Journals-panel__image_i">
                    @if(optional($publish)->image)
                        <img src="{{ url('storage/'.$publish->image) }}" alt="">
                    @else
                        <img  src="{{ asset('/front/theme/assets/images/icon/icon-plus.svg') }}" class="Journals-panel__image_i__icon" />
                    @endif
                </div>
                <div class="Journals-panel__image_label">
                    انتخاب تصویر نشریه
                </div>
            </label>
            <input type="file" name='image' id="JournalsImageUp" class="Journals-panel__image_file">
        </div>
    </div>
</form>
