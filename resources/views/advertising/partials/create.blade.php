<form action="{{ route('advertising.store') }}" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">عنوان</label>
            <input type="text" class="form-control" name="title">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">لینک</label>
            <input type="text" class="form-control" name="link" id="">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">تصویر</label>
            <input type="file" class="form-control" name="image" id="">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <button type="button" class="btn btn-info store-inf">ثبت تبلیغات</button>
        </div>
    </div>
</div>
</form>