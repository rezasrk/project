<form action="{{ route('admins.update',$user->id) }}" method="POST">
    {!! method_field('PATCH') !!}
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>نام</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>پست الکترونیکی</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>کلمه ی عبور</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label>نقش</label>
            <select class="form-control" name="roles">
                <option value>انتخاب نمایید...</option>
                @foreach($roles as $role)
                    <option @if($role->name == optional($user->roles()->first())->name) selected
                            @endif value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button type="button" class="btn btn-info store-user">ویرایش کاربر</button>
        </div>
    </div>
</form>
