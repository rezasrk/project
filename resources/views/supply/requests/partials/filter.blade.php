<form>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>نام کالا</label>
                <input autocomplete="off" value="{{ request()->query('category_title') }}" name="category_title"
                       type="tex" class="form-control">
            </div>
        </div>
        <div class="col-md">
            <label>کد </label>
            <input type="text" class="form-control" name="request_code"
                   value="{{ request()->query('request_code') }}">
        </div>
        <div class="col-md">
            <label>ثبت کننده</label>
            <select type="text" class="form-control select2" name="creator_name"></select>
        </div>
        <div class="col-md">
            <label>موضوع</label>
            <input type="text" class="form-control" name="subject" value="{{ request()->query('subject') }}">
        </div>
        <div class="col-md">
            <label>تاریخ از </label>
            <input autocomplete="off" type="text" class="form-control datepicker" name="start_date"
                   value="{{ request()->query('start_date') }}">
        </div>
        <div class="col-md">
            <label>تاریخ تا</label>
            <input autocomplete="off" type="text" class="form-control datepicker" name="end_date"
                   value="{{ request()->query('end_date') }}">
        </div>

    </div>
    <div class="row">
        <div class="col">
            <div class="form-group mt-4">
                <button class="btn btn-primary">جستجو</button>
                <a href="{{ '/'.request()->path() }}" class="btn btn-danger">بارگزاری مجدد</a>
            </div>
        </div>
    </div>
</form>
