<form action="{{ route('users.store') }}" method="POST">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" class="form-control" name="username">
                <input type="hidden" name="user_id" value="0">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>نام</label>
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>پست الکترونیکی</label>
                <input type="text" class="form-control" name="email">
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
                    <option value="{{ $project->id }}">{{ $project->project_title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label>وضعیت درخواست ها</label>
            <select class="form-control select2" multiple name="status[]">
                @foreach($conditionRequest as $condKey=>$condValue)
                    <option value="{{ $condKey }}">{{ $condValue }}</option>
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
                    <option value="{{ $typeKey }}">{{ $typeValue }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label>نقش</label>
            <select class="form-control" name="roles" >
                <option value>انتخاب نمایید...</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button type="button" class="btn btn-info store-user">ثبت کاربر</button>
        </div>
    </div>
</form>
