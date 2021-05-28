<form method="POST" action="{{ route('cooperator.store') }}">
    <div class="row">
        <div class="col-md">
            <label>نام همکار</label>
            <input type="text" class="form-control" name="cooperator">
        </div>
        <div class="col-md">
            <label>عکس</label>
            <input type="file" class="form-control" name="file">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <button class="btn btn-info store-cooperator" type="button">ثبت همکار جدید</button>
        </div>
    </div>
</form>
