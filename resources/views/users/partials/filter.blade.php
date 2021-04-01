<form>
    <div class="row">
        <div class="col-md-3">
            <label>نام کاربر</label>
            <input type="text" class="form-control" name="name" value="{{ request()->query('name') }}">
        </div>

        <div class="col-md-3">
            <label>پست الکترونیکی</label>
            <input type="text" class="form-control" name="email" value="{{ request()->query('email') }}">
        </div>

        <div class="col-md-6 mt-3">
            <div class="form-group float-right">
                <button class="btn btn-primary">جستجو</button>
            </div>
        </div>
    </div>
</form>
