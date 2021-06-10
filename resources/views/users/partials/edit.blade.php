<form action="{{ route('users.update',$user->id) }}" method="POST">
    @method('PATCH')
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>نام و نام خانوادگی</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>پست الکترونیکی</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>وب سایت شخصی</label>
                <input type="text" class="form-control" name="website" value="{{ $user->website }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>مدرک تحصیلی</label>
                <select name="degree" class="form-control">
                    <option value>انتخاب نمایید...</option>
                    @foreach($degrees as $degKey=>$degValue)
                        <option @if($user->degree == $degKey) selected
                                @endif value="{{ $degKey }}">{{ $degValue }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>درجه ی علمی</label>
                <select name="rank" class="form-control">
                    <option value>انتخاب نمایید...</option>
                    @foreach($rank as $keyRank=>$valueRank)
                        <option @if($keyRank == $user->scientific_rank) selected @endif value="{{ $keyRank }}">{{ $valueRank }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>کلمه ی عبور</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-info update-user" type="button">ویرایش اطلاعات کاربر</button>
        </div>
    </div>
</form>
