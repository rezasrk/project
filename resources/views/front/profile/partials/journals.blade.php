<div class="tab-pane Journals-panel fade" id="Journals" role="tabpanel"
     aria-labelledby="Journals-tab">

    <div class="row">
        <div class="col-12">

        </div>
    </div>


    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">عنوان نشریه</label>
                        </div>
                        <input type="text" class="text-input__input">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">آدرس</label>
                        </div>
                        <input type="text" class="text-input__input">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">تلفن تماس</label>
                        </div>
                        <input type="text" class="text-input__input">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">پست الکترونیکی</label>
                        </div>
                        <input type="text" class="text-input__input">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">آدرس اینترنتی</label>
                        </div>
                        <input type="text" class="text-input__input">
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="text-input">
                        <div class="text-input__grid">
                            <label class="text-input__label">درباره ناشر</label>
                        </div>
                        <textarea type="text" class="text-input__input" rows="5"></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <label for="JournalsImageUp" class="Journals-panel__image">
                <div class="Journals-panel__image_i">

                    <!-- default icon -->
                    <img src="{{ asset('front/theme/assets/images/icon/icon-plus.svg') }}"
                         class="Journals-panel__image_i__icon"/>

                    <!-- image upload -->
                    <!-- <img src="./assets/images/img1.jpg" class="Journals-panel__image_i__img" alt=""> -->
                </div>
                <div class="Journals-panel__image_label">
                    انتخاب تصویر نشریه
                </div>
            </label>
            <input type="file" id="JournalsImageUp" class="Journals-panel__image_file">
        </div>
    </div>
</div>
