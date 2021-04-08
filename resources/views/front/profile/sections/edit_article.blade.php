<form method="POST" action="{{ route('front.article.store') }}">
    @csrf
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="text-input">
                <div class="form-group">
                    <label class="text-input__label">عنوان</label>
                </div>
                <input type="text" class="form-control" name="title" value="{{ $artic->title }}">
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="form-group">
                    <label class="text-input__label">درجه علمی</label>
                </div>
                <select type="text" class="form-control" name="article_degree">
                    <option value>انتخاب نمایید...</option>
                    @foreach($degrees as $degreeKey=>$degreeValue)
                        <option @if($artic->article_degree == $degreeKey)  selected
                                @endif value="{{ $degreeKey }}">{{ $degreeValue }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="form-group">
                    <label class="text-input__label">انتخاب مجله</label>
                </div>
                <select type="text" class="form-control select-journal" name="journal_id">
                    <option value>انتخاب نمایید...</option>
                    @foreach($journals as $journal)
                        <option data-url="{{ route('getJournalNumbers').'?journal_id='.$journal->id }}"
                                value="{{ $journal->id }}"
                                @if($artic->journal_id == $journal->id)  selected @endif>{{ $journal->journal_title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="text-input">
                <div class="form-group">
                    <label class="text-input__label">انتخاب شماره</label>
                </div>
                <select type="text" class="form-control show-number-journal" name="journal_number_id">
                    <option value>انتخاب نمایید...</option>
                    @foreach($journal_number as $jrnNumber)
                        <option @if($jrnNumber->id == $artic->journal_number_id) selected
                                @endif value="{{ $jrnNumber->id }}">{{ $jrnNumber->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-6 col-md-6">
                    <div class="text-input">

                        <div class="form-group">
                            <label class="text-input__label">از صفحه</label>
                        </div>
                        <input type="text" class="form-control" name="from_page" value="{{ $artic->from_page }}">
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="text-input">
                        <div class="form-group">
                            <label class="text-input__label">تا صفحه</label>
                        </div>
                        <input type="text" class="form-control" name="to_page" value="{{ $artic->to_page }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="text-input">
                <div class="form-group">
                    <label class="text-input__label">نویسنده یا نویسندگان</label>
                </div>
                <select type="text" class="form-control" name="writers" multiple>
                    <option value>انتخاب نمایید...</option>
                    @foreach($writers as $writer)
                        <option
                            @if(in_array($writer->id,$selectWriters)) selected @endif value="{{ $writer->id }}">{{ $writer->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="text-input">
                <div class="form-group">
                    <label class="text-input__label">کلید واژه</label>
                </div>
                <select type="text" class="form-control" name="tags" multiple>
                    <option value>انتخاب نمایید...</option>
                    @foreach($tags as $tag)
                        <option  @if(in_array($writer->id,$selectWriters)) selected @endif  value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12">
            <div class="section-head">
                <h3>انتخاب حوضه های تخصصی</h3>
            </div>

            <div class="row sample-category">
                <div class="col-6 col-md-3">
                    <div class="text-input">
                        <div class="form-group">
                            <label class="text-input__label">دسته ی موضوع</label>
                        </div>
                        <select type="text" class="form-control select-first-category" name="category_first_id[]">
                            <option value>انتخاب نمایید...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="text-input">
                        <div class="form-group">
                            <label class="text-input__label">مرحله دوم</label>
                        </div>
                        <select type="text" class="form-control select-second-category" name="category_second_id[]">
                            <option value>انتخاب نمایید...</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="text-input">
                        <div class="form-group">
                            <label class="text-input__label">مرحله سوم</label>
                        </div>
                        <select type="text" class="form-control select-third-category" name="category_third_id[]">
                            <option value>انتخاب نمایید...</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="text-input">
                        <div class="form-group">
                            <label class="text-input__label">مرحله چهارم</label>
                        </div>
                        <select type="text" class="form-control select-firth-category" name="category_forth_id[]">
                            <option value>انتخاب نمایید...</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div style="display: flex; justify-content: flex-end;margin-bottom: 10px;">
                    <button class="button-add add-category-form">
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
            <div class="form-group">
                <label class="text-input__label">چکیده مقاله</label>
            </div>
            <textarea name="article_summery" type="text" class="text-input__textarea" rows="10">{{ $artic->article_summery }}</textarea>
        </div>
    </div>


    <div class="col-12 col-md-4">
        <div class="text-input">
            <div class="form-group">
                <label class="text-input__label">بارگزاری فایل مقاله</label>
            </div>
            <input name="attachment" type="file" class="text-input__file" data-buttontext="find"
                   data-placeholder="No file"
                   id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
        </div>
    </div>


    <div>

        <div class="col-12 col-md-4">
            <button type="button" class="button-primary store-info">
                ثبت مقاله
            </button>
        </div>
    </div>
</form>
