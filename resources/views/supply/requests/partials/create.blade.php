<form action="{{ route('request.store') }}">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>موضوع</label>
                <input type="text" class="form-control" name="subject">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>درخواست کننده</label>
                <input type="text" class="form-control" name="applicant_name">
            </div>
        </div>
        @if($showUnitRequester)
            <div class="col">
                <div class="form-group">
                    <label>واحد درخواست کننده</label>
                    <select type="text" class="form-control" name="unit_requester_id">
                        <option value>انتخاب نمایید...</option>
                        @foreach($unitRequesters as $unitKey=>$unitValue)
                            <option value="{{ $unitKey }}">{{ $unitValue }}</option>
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
                        <option value="{{ $keyType }}">{{ $valueType }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row sample-category-form">
        <div class="col">
            <div class="form-group">
                <label>کدینگ</label>
                <select class="form-control select2 get-unit" name="category_id[]">
                </select>
            </div>
            <input type="hidden" name="request_detail_id[]" value="0">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>واحد</label>
                <label class="form-control show-unit"></label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>مقدار</label>
                <input type="text" class="form-control" name="amount[]">
            </div>
        </div>
        <div class="col-md-1 mt-4">
            <div class="form-group">
                <i class="text-danger delete-html fa fa-trash-alt"></i>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>توضیحات</label>
                <input type="text" class="form-control" name="description[]">
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button class="btn btn-info store-categories" type="button">ثبت درخواست</button>
            <button class="btn btn-warning add-form" type="button"> افزودن فرم جدید</button>
        </div>
    </div>
</form>
