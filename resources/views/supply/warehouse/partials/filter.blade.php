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
            <div class="form-group">
                <label>نام کامل کالا</label>
                <select class="form-control select2" name="category_id">
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group mt-4">
                <button class="btn btn-primary">جستجو</button>
                <a href="{{ '/'.request()->path() }}" class="btn btn-danger">بارگزاری مجدد</a>
            </div>
        </div>
    </div>
</form>
