<form>
    <div class="row">
        <div class="col-md">
            <label>نام کاربر</label>
            <input type="text" class="form-control" name="name" value="{{ request()->query('name') }}">
        </div>

        <div class="col-md">
            <label>نام کاربری</label>
            <input type="text" class="form-control" name="username" value="{{ request()->query('username') }}">
        </div>

        <div class="col-md">
            <label>پست الکترونیکی</label>
            <input type="text" class="form-control" name="email" value="{{ request()->query('email') }}">
        </div>
        <div class="col-md mt-4">
            <input type="checkbox" value="1">
            <label>ثبت به عنوان نویسنده</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <label>مدرک تحصیلی</label>
            <select class="form-control" name="degree">
                <option value>انتخاب نمایید...</option>
                @foreach($degrees as $degKey=>$degValue)
                    <option @if(request()->query('degree') == $degKey) selected @endif value="{{ $degKey }}">{{ $degValue }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md">
            <label>درجه ی علمی</label>
            <select class="form-control" name="rank">
                <option value>انتخاب نمایید...</option>
                @foreach($rank as $rankKey=>$rankValue)
                    <option @if(request()->query('rank') == $rankKey) selected
                            @endif value="{{ $rankKey }}">{{ $rankValue }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md">
            <label>وب سایت شخصی</label>
            <input type="text" class="form-control" name="website" value="{{ request()->query('website') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md">
            <div class="form-group">
                <button class="btn btn-primary">جستجو</button>
            </div>
        </div>
    </div>
</form>
