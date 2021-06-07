<form method="GET">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>عنوان نشریه</label>
                <input type="text" class="form-control" name="journal_title"
                       value="{{ request()->query('journal_title') }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>ثبت کننده</label>
                <input type="text" class="form-control" name="creator"
                       value="{{ request()->query('creator') }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>پست الکترونیکی</label>
                <input type="text" class="form-control" name="email"
                       value="{{ request()->query('email') }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>تلفن ثابت</label>
                <input type="text" class="form-control" name="phone"
                       value="{{ request()->query('phone') }}">
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-md-12">
            <button class="btn btn-primary">جستجو</button>
        </div>
    </div>
</form>
