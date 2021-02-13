<div class="row sample-mrs-form">
    <div class="col-md-2">
        <div class="form-group">
            <label>مقدار</label>
            <input type="text" class="form-control mrs-input" name="amount[]"
                   value="{{ empty($mrs) ? '' :  $mrs->amount }}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>شماره mrs ( رسید انبار )</label>
            <input type="text" class="form-control mrs-input" name="request_detail_no[]"
                   value="{{ empty($mrs) ? '' :  $mrs->request_detail_no }}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>تاریخ</label>
            <input type="text" autocomplete="off" class="form-control mrs-input datepicker"
                   name="date[]" value="{{ empty($mrs) ? '' :  $mrs->date }}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>مبلغ</label>
            <input type="text" class="form-control mrs-input number-format" name="price[]"
                   value="{{ !empty($mrs) ? number_format($mrs->price) : 0  }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>توضیحات</label>
            <textarea rows="1" class="form-control mrs-input"
                      name="description[]">{{ !empty($mrs) ? $mrs->description : '' }}</textarea>
        </div>
    </div>
    @can('unit-money-mrs')
        <div class="col-md-6">
            <div class="form-group">
                <label>واحد پول</label>
                <select class="form-control mrs-input" name="unit_price[]">
                    @foreach($units as $keyUnit=>$valueUnit)
                        <option
                            @if(!empty($mrs) && $keyUnit == $mrs->unit_price) selected
                            @endif value="{{ $keyUnit }}">{{ $valueUnit }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endcan
    @can('shop-mrs')
        <div class="col-md-6">
            <div class="form-group">
                <label>فروشگاه</label>
                <select class="form-control mrs-input" name="shop_id[]">
                    @foreach($shops as $shop)
                        <option
                            @if(!empty($mrs) && $shop->id == $mrs->shop_id) selected
                            @endif value="{{ $shop->id }}">{{ $shop->shop_title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    @endcan
    @can('extra-mrs')
        <div class="col-md-4">
            <label>شماره پکینگ تهران</label>
            <input type="text" class="form-control mrs-input" name="extra_a[]"
                   value="{{ !empty($mrs) ?  optional($mrs->extra_value)->extra_a : '' }}">
        </div>
        <div class="col-md-4">
            <label>شماره پکینگ سایت</label>
            <input type="text" class="form-control mrs-input" name="extra_b[]"
                   value="{{ !empty($mrs) ? optional($mrs->extra_value)->extra_b : '' }}">
        </div>
        <div class="col-md-4">
            <label>کد همکاران</label>
            <input type="text" class="form-control mrs-input" name="extra_c[]"
                   value="{{ !empty($mrs) ? optional($mrs->extra_value)->extra_c : '' }}">
        </div>
    @endcan
</div>
