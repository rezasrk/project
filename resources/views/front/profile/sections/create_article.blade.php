<div class="row">

    <div class="col-12 col-md-8">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">عنوان</label>
            </div>
            <input type="text" class="text-input__input">
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">درجه علمی</label>
            </div>
            <select type="text" class="text-input__input">
                <option value>انتخاب نمایید...</option>
                @foreach($degrees as $degreeKey=>$degreeValue)
                    <option value="{{ $degreeKey }}">{{ $degreeValue }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">انتخاب محله</label>
            </div>
            <select type="text" class="text-input__input">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">انتخاب شماره</label>
            </div>
            <select type="text" class="text-input__input">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-6 col-md-6">
                <div class="text-input">

                    <div class="text-input__grid">
                        <label class="text-input__label">از صفحه</label>
                    </div>
                    <input type="text" class="text-input__input">
                </div>
            </div>
            <div class="col-6 col-md-6">
                <div class="text-input">

                    <div class="text-input__grid">
                        <label class="text-input__label">تا صفحه</label>
                    </div>
                    <input type="text" class="text-input__input">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">نویسنده یا نویسندگان</label>
            </div>
            <select type="text" class="text-input__input">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">کلید واژه</label>
            </div>
            <select type="text" class="text-input__input">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>

    <div class="col-12">
        <div class="section-head">
            <h3>انتخاب حوضه های تخصصی</h3>
        </div>

        <div class="row">
            <div class="col-6 col-md-3">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">مرحله اول</label>
                    </div>
                    <select type="text" class="text-input__input">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">مرحله دوم</label>
                    </div>
                    <select type="text" class="text-input__input">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">مرحله سوم</label>
                    </div>
                    <select type="text" class="text-input__input">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">مرحله چهارم</label>
                    </div>
                    <select type="text" class="text-input__input">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div style="display: flex; justify-content: flex-end;margin-bottom: 10px;">
                    <button class="button-add">
                        <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                  d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                        </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                        <span>افزودن ردیف جدید</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">چکیده مقاله</label>
            </div>
            <textarea type="text" class="text-input__textarea" rows="10"></textarea>
        </div>
    </div>


    <div class="col-12 col-md-4">
        <div class="text-input">
            <div class="text-input__grid">
                <label class="text-input__label">بارگزاری فایل مقاله</label>
            </div>
            <input type="file" class="text-input__file" data-buttontext="find" data-placeholder="No file"
                   id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
            <div class="bootstrap-filestyle input-group">
                <div name="filedrag" style="position: absolute; width: 100%; height: 30px; z-index: -1;"></div>
                <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-0"
                                                                                       style="margin-bottom: 0px; border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"
                                                                                       class="btn btn-secondary "><span
                            class="buttonText">انتخاب فایل</span></label></span><input type="text" class="form-control "
                                                                                       placeholder="فایلی انتخاب نشده"
                                                                                       disabled=""></div>
        </div>
    </div>


    <div>

        <div class="col-12 col-md-4">
            <button class="button-primary">
                ثبت مقاله
            </button>
        </div>
    </div>
</div>
