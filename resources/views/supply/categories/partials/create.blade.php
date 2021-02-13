<form action="{{ route('categories.store') }}" method="post">
    <input type="hidden" class="form-control" autocomplete="off" name="category_parent_id" value="{{ $parent_id }}">
    <div class="row category-sample-form-category">
        <div class="col mt-4">
            <input type="checkbox" name="is_product[]">
            <label>نام اصلی کالا</label>
        </div>
        <div class="col">
            <label>عنوان کدینگ</label>
            <input type="text" class="form-control" autocomplete="off" name="category_title[]">
        </div>
        <div class="col">
            <label>دیسیپلین</label>
            <select class="form-control" name="discipline_id[]">
                <option value>انتخاب نمایید...</option>
                @foreach($disciplines as $disKey=>$disValue)
                    <option value="{{ $disKey }}">{{ $disValue }}</option>
                @endforeach
            </select>
        </div>
        <div class="col"><label>واحد</label>
            <select class="form-control" name="unit_id[]">
                <option value>انتخاب نمایید...</option>
                @foreach($units as $unitKey=>$unitValue)
                    <option value="{{ $unitKey }}">{{ $unitValue }}</option>
                @endforeach

            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button class="btn btn-info store-category" type="button"> ثبت کدینگ</button>
            <button class="btn btn-warning add-new-form" type="button"> افزودن فرم جدید</button>
            <button class="btn btn-danger remove-category-form" type="button"> حذف فرم</button>
        </div>
    </div>
</form>
