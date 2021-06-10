<form action="{{ route('publisher.update',$publisher->id) }}" method="POST">
    @method('PATCH')
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>عنوان</label>
                <input type="text" class="form-control" name="title" value="{{ $publisher->title }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>شماره تماس</label>
                <input type="text" class="form-control" name="phone" value="{{ $publisher->phone }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>پست الکترونیکی</label>
                <input type="text" class="form-control" name="email" value="{{ $publisher->email }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>وب سایت </label>
                <input type="text" class="form-control" name="web_site" value="{{ $publisher->web_site }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>آدرس نشریه</label>
                <input type="text" class="form-control" name="address" value="{{ $publisher->address }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>تصویر مجوز</label>
                <input type="file" name="license">
                <img src="{{ url('storage/'.$publisher->license) }}" width="100px" height="100px">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>تصویر نامه</label>
                <input type="file" name="letter">
                <img class="mt-4" src="{{ url('storage/'.$publisher->letter) }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>تصویر لوگو</label>
                <input type="file" name="logo">
                @if($publisher->logo)
                    <img src="{{ url('storage/'.$publisher->logo) }}">
                @endif
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md">
            <button class="btn btn-info update-publisher" type="button">ویرایش ناشر</button>
        </div>
    </div>
</form>
