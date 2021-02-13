<form action="{{ route('action.assign') }}">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">نام کاربر</label>
                <select name="assign_id" class="form-control select2 assign-user-name"></select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-info assign-user">{{ trans('button.assign') }}</button>
        </div>
    </div>
</form>
