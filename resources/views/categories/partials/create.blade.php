<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>عنوان</label>
                <input type="text" class="form-control" name="title" autocomplete="off">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>نوع دسته بندی</label>
                <select class="form-control category-type" name="type_id">
                    <option value>انتخاب نمایید...</option>
                    @foreach($types as $keyType=>$valueType)
                        <option data-url="{{ route('category.parent').'?type_id='.$keyType }}"
                                value="{{ $keyType }}">{{ $valueType }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>دسته ی والد</label>
                <select class="form-control category-parent" name="parent_id"></select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <button type="button" class="btn btn-info store-category">ثبت دسته بندی</button>
        </div>
    </div>
</form>
