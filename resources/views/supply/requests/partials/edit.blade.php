<form action="{{ route('request.update',$rq->id) }}">
    {!! method_field('patch') !!}
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>موضوع</label>
                <input type="text" class="form-control" name="subject" value="{{ $rq->subject }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>درخواست کننده</label>
                <input type="text" class="form-control" name="applicant_name" value="{{ $rq->applicant_name }}">
            </div>
        </div>
        @if($showUnitRequester)
            <div class="col">
                <div class="form-group">
                    <label>واحد درخواست کننده</label>
                    <select type="text" class="form-control" name="unit_requester_id">
                        <option value>انتخاب نمایید...</option>
                        @foreach($unitRequesters as $unitKey=>$unitValue)
                            <option @if($unitKey == $rq->unit_requester_id) selected
                                    @endif value="{{ $unitKey }}">{{ $unitValue }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
        <div class="col">
            <div class="form-group">
                <label>نوع درخواست </label>
                <select class="form-control" name="type">
                    <option value>انتخاب نمایید...</option>
                    @foreach($typeRequests as $keyType=>$valueType)
                        <option @if($keyType == $rq->type) selected
                                @endif value="{{ $keyType }}">{{ $valueType }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    @foreach($rq->details as $detail)
        <div class="row sample-category-form">
            <div class="col">
                <div class="form-group">
                    <label>کدینگ</label>
                    <select class="form-control select2 get-unit" name="category_id[]">
                        <option selected
                                value="{{ $detail->category->id }}">{{ $detail->category->category_title }}</option>
                    </select>
                </div>
                <input type="hidden" name="request_detail_id[]" value="{{ $detail->id }}">
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>واحد</label>
                    <label class="form-control show-unit">{{ optional($detail->category->unit)->value }}</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>مقدار</label>
                    <input type="text" class="form-control" name="amount[]" value="{{ $detail->amount }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>توضیحات</label>
                    <input type="text" class="form-control" name="description[]" value="{{ $detail->description }}">
                </div>
            </div>
        </div>
    @endforeach
    <div class="row mt-4">
        <div class="col">
            <button class="btn btn-info store-categories" type="button">ویرایش درخواست</button>
            <button class="btn btn-warning add-form" type="button"> افزودن فرم جدید</button>
        </div>
    </div>
</form>
