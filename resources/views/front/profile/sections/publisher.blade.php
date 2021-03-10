<form method="POST" action="{{ route('front.publisher.store') }}">
    <div class="tab-pane fade show active" id="user-info" role="tabpanel"
         aria-labelledby="user-info-tab">
        <div class="row">
            @csrf
            <input type="hidden" name="publisher_id" value="{{ optional($publisher)->id }}">
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">عنوان نشریه</label>
                    <input type="text" class="text-input__input" name="publisher_title"
                           value="{{ optional($publisher)->publisher_title }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">صاحب امتیاز نشریه</label>
                    <input type="text" class="text-input__input" name="owner_publisher"
                           value="{{ optional($publisher)->owner_publisher }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">تقاضا کننده</label>
                    <input type="text" class="text-input__input" name="requester"
                           value="{{ optional($publisher)->requester }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">سمت تقاضا کننده</label>
                    <select class="text-input__input" name="rank_requester">
                        <option value>انتخاب نمایید...</option>
                        @foreach($rank_requester as $keyRankRequester=>$valueRankRequester)
                            <option
                                @if($keyRankRequester == optional($publisher)->rank_requester) selected @endif
                            value="{{ $keyRankRequester }}">{{ $valueRankRequester }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">درجه ی علمی نشریه</label>
                    <select class="text-input__input" name="degree_publisher">
                        <option value>انتخاب نمایید...</option>
                        @foreach($degree_publisher as $keyDegreeJournal=>$valueDegreeJournal)
                            <option
                                @if($keyDegreeJournal == optional($publisher)->degree_publisher) selected @endif
                            value="{{ $keyDegreeJournal }}">{{ $valueDegreeJournal }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">دارای مجوز از </label>
                    <select class="text-input__input" name="license_from">
                        <option value>انتخاب نمایید...</option>
                        @foreach($license_from as $keyLicenseFrom=>$valueLicenseFrom)
                            <option
                                @if($keyLicenseFrom == optional($publisher)->license_from) selected @endif
                            value="{{ $keyLicenseFrom }}">{{ $valueLicenseFrom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">شماره تماس</label>
                    <input type="text" class="text-input__input" name="publisher_phone"
                           value="{{ optional($publisher)->publisher_phone }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label"> پست الکترونیکی</label>
                    <input type="text" class="text-input__input" name="publisher_email"
                           value="{{ optional($publisher)->publisher_email }}">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">لوگو نشریه</label>
                    </div>
                    <input name="publisher_logo" type="file" class="text-input__file">
                    @if(optional($publisher)->publisher_logo)
                        <img class="mt-3" width="100px" height="100px"
                             src="{{ url('storage/'.optional($publisher)->publisher_logo) }}">
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">تصویر مجوز انتشار</label>
                    </div>
                    <input name="publisher_license_image" type="file" class="text-input__file">
                    @if(optional($publisher)->publisher_license_image)
                        <img class="mt-3" width="100px" height="100px"
                             src="{{ url('storage/'.optional($publisher)->publisher_license_image) }}">
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-input">
                    <div class="text-input__grid">
                        <label class="text-input__label">نامه ی درخواست</label>
                    </div>
                    <input name="publisher_letter" type="file" class="text-input__file">
                    @if(optional($publisher)->publisher_letter)
                        <a class="mt-3"
                           href="{{ route('simple.download').'?path='.optional($publisher)->publisher_letter }}">
                            لینک دانلود
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-input">
                    <label class="text-input__label">ادرس سامانه نشریه</label>
                    <textarea type="text" class="text-input__input" name="publisher_web_site"
                              rows="1">{{optional($publisher)->publisher_web_site}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="button" class="btn btn-warning publisher-store">ثبت اطلاعات</button>
                </div>
            </div>
        </div>
    </div>
</form>
