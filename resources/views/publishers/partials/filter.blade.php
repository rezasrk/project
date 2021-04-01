<form method="GET">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>عنوان نشریه</label>
                <input type="text" class="form-control" name="journal_title"
                       value="{{ request()->query('journal_title') }}">
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="form-group">
            <button class="btn btn-primary">جستجو</button>
        </div>
    </div>
</form>
