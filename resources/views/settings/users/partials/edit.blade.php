<form action="{{ route('users.update',$user->id) }}" method="POST">
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
            <label>پروژه</label>
            <select class="form-control select2" multiple name="project_id[]">
                @foreach($projects as $project)
                    <option @if(in_array($project->id,$userProject)) selected
                            @endif  value="{{ $project->id }}">{{ $project->project_title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label>وضعیت درخواست ها</label>
            <select class="form-control select2" multiple name="status[]">
                @foreach($conditionRequest as $condKey=>$condValue)
                    <option @if(in_array($condKey,$user->status_req)) selected
                            @endif value="{{ $condKey }}">{{ $condValue }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label>نوع درخواست ها</label>
            <select class="form-control select2" multiple name="type[]">
                <option value>انتخاب نمایید...</option>
                @foreach($typeRequest as $typeKey=>$typeValue)
                    <option @if(in_array($typeKey,$user->type_req)) selected
                            @endif value="{{ $typeKey }}">{{ $typeValue }}</option>
                @endforeach
            </select>
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
