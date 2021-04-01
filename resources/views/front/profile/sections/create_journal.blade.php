<form action="{{ route('front.journal.store') }}" method="POST">
    @csrf
    <input type="hidden" name="journal_id" value="{{ optional($journal)->id }}">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">عنوان</label>
                </div>
                <input type="text" class="text-input__input" name="journal_title"
                       value="{{ optional($journal)->journal_title }}">
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">انتخاب ناشر</label>
                </div>
                <select type="text" class="text-input__input" name="publisher">
                    <option value>انتخاب کنید...</option>
                    @foreach($publishers as $keyPublisher=>$valuePublisher)
                        <option @if(optional($journal)->publisher == $keyPublisher) selected
                                @endif value="{{ $keyPublisher }}">{{ $valuePublisher }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">درباره مجله</label>
                </div>
                <textarea type="text" class="text-input__textarea" rows="4"
                          name="about_journal">{{ optional($journal)->about_journal }}</textarea>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">دسته بندی موضوعی</label>
                </div>
                <select type="text" class="text-input__input" name="category_id">
                    <option value>انتخاب نمایید...</option>
                    @foreach($categories as $category)
                        <option @if(optional($journal)->category_id == $category->id) selected
                                @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">درجه علمی</label>
                </div>
                <select type="text" class="text-input__input" name="degree">
                    <option value>انتخاب نمایید...</option>
                    @foreach($degrees as $degreeKey=>$degreeValue)
                        <option @if($degreeKey == optional($journal)->degree) selected
                                @endif value="{{ $degreeKey }}">{{ $degreeValue }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">دوره انتشار</label>
                </div>
                <select type="text" class="text-input__input" name="period_journal">
                    <option value>انتخاب نمایید...</option>
                    @foreach($period_publisher as $keyPeriodPublish=>$valuePeriodPublish)
                        <option @if($keyPeriodPublish == optional($journal)->period_journal) selected @endif value="{{ $keyPeriodPublish }}">{{ $valuePeriodPublish }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">صاحب امتیاز</label>
                </div>
                <input type="text" class="text-input__input" name="owner_journal"
                       value="{{ optional($journal)->owner_journal }}">
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">مدیر مسئول</label>
                </div>
                <input type="text" class="text-input__input" name="manager" value="{{ optional($journal)->manager }}">
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">سر دبیر</label>
                </div>
                <input type="text" class="text-input__input" name="chief_editor"
                       value="{{ optional($journal)->chief_editor }}">
            </div>
        </div>

        <div class="col-12">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">هیئت تحریریه</label>
                </div>
                <textarea type="text" class="text-input__textarea" rows="4"
                          name="editorial_board">{{ optional($journal)->editorial_board }}</textarea>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">p-issn</label>
                </div>
                <input type="text" class="text-input__input" name="p_issn" value="{{ optional($journal)->p_issn }}">
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">e-issn</label>
                </div>
                <input type="text" class="text-input__input" name="e_issn" value="{{ optional($journal)->e_issn }}">
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">کد پستی</label>
                </div>
                <input type="text" class="text-input__input" name="post_code"
                       value="{{ optional($journal)->post_code }}">
            </div>
        </div>

        <div class="col-12">
            <div class="text-input">
                <div class="text-input__grid">
                    <label class="text-input__label">آدرس</label>
                </div>
                <input type="text" class="text-input__input" name="address" value="{{ optional($journal)->address }}">
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="text-input">
                                <div class="text-input__grid">
                                    <label class="text-input__label">تلفن</label>
                                </div>
                                <input type="text" class="text-input__input" name="phone"
                                       value="{{ optional($journal)->phone }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-input">
                                <div class="text-input__grid">
                                    <label class="text-input__label">فکس</label>
                                </div>
                                <input type="text" class="text-input__input" name="fax"
                                       value="{{ optional($journal)->fax }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-input">
                                <div class="text-input__grid">
                                    <label class="text-input__label">پست الکترونیک</label>
                                </div>
                                <input type="text" class="text-input__input" name="email"
                                       value="{{ optional($journal)->email }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-input">
                                <div class="text-input__grid">
                                    <label class="text-input__label">وب سایت</label>
                                </div>
                                <input type="text" class="text-input__input" name="website"
                                       value="{{ optional($journal)->website }}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="Journals-panel__image_grid">

                        <label for="JournalsImageUp" class="Journals-panel__image" style="margin-top: 27px;">
                            <div class="Journals-panel__image_i">
                                @if(optional($journal)->image)
                                    <img width="200px" height="200px"
                                         src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($journal->image) }}">
                                @else
                                    <img src="{{ asset('front/theme/assets/images/icon/icon-plus.svg') }}"
                                         class="Journals-panel__image_i__icon"/>
                                @endif
                            </div>
                            <div class="Journals-panel__image_label">
                                تصویر مجله
                            </div>
                        </label>
                    </div>
                    <input type="file" id="JournalsImageUp" class="Journals-panel__image_file" name="image">
                </div>
            </div>
            <div class="col-md-9">
                <br/>
                <button type="button" class="button-primary store-journal">ثبت مجله</button>
            </div>
        </div>
    </div>
</form>
