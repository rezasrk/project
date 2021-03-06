<form method="POST" action="{{ route('front.journal.store') }}">
    <div class="tab-pane fade show active" id="user-info" role="tabpanel"
         aria-labelledby="user-info-tab">
        <div class="row">
            @csrf
            <input type="hidden" name="journal_id" value="{{ optional($journal)->id }}">
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">عنوان نشریه</label>
                    <input type="text" class="text-input__input" name="journal_title"
                           value="{{ optional($journal)->journal_title }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">صاحب امتیاز نشریه</label>
                    <input type="text" class="text-input__input" name="owner_journal"
                           value="{{ optional($journal)->owner_journal }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">تقاضا کننده</label>
                    <input type="text" class="text-input__input" name="requester"
                           value="{{ optional($journal)->requester }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">سمت تقاضا کننده</label>
                    <select class="text-input__input" name="rank_requester">
                        <option value>انتخاب نمایید...</option>
                        @foreach($rank_requester as $keyRankRequester=>$valueRankRequester)
                            <option
                                @if($keyRankRequester == optional($journal)->rank_requester) selected @endif
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
                    <select class="text-input__input" name="degree_journal">
                        <option value>انتخاب نمایید...</option>
                        @foreach($degree_journal as $keyDegreeJournal=>$valueDegreeJournal)
                            <option
                                @if($keyDegreeJournal == optional($journal)->degree_journal) selected @endif
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
                                @if($keyLicenseFrom == optional($journal)->license_from) selected @endif
                            value="{{ $keyLicenseFrom }}">{{ $valueLicenseFrom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label">شماره تماس</label>
                    <input type="text" class="text-input__input" name="journal_phone"
                           value="{{ optional($journal)->journal_phone }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-input">
                    <label class="text-input__label"> پست الکترونیکی</label>
                    <input type="text" class="text-input__input" name="journal_email"
                           value="{{ optional($journal)->journal_email }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="text-input">
                    <label>لوگو نشریه</label>
                    <input type="file" name="journal_logo">
                    @if(optional($journal)->journal_logo)
                        <img class="mt-3" width="100px" height="100px"
                             src="{{ url('storage/'.optional($journal)->journal_logo) }}">
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-input">
                    <label>تصویر مجوز انتشار</label>
                    <input type="file" name="journal_license_image">
                    @if(optional($journal)->journal_license_image)
                        <img class="mt-3" width="100px" height="100px"
                             src="{{ url('storage/'.optional($journal)->journal_license_image) }}">
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-input">
                    <label>نامه ی درخواست</label>
                    <input type="file" name="journal_letter">
                    @if(optional($journal)->journal_letter)
                        <a class="mt-3"
                           href="{{ route('simple.download').'?path='.optional($journal)->journal_letter }}">
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
                    <textarea type="text" class="text-input__input" name="journal_web_site"
                              rows="1">{{optional($journal)->journal_web_site}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="button" class="btn btn-warning journal-store">ثبت اطلاعات</button>
                </div>
            </div>
        </div>
    </div>
</form>
