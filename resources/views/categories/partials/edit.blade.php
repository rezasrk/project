<form action="{{ route('categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label>عنوان</label>
                <input type="text" class="form-control" name="title" autocomplete="off" value="{{ $category->title }}">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>نوع دسته بندی</label>
                <select class="form-control category-type" name="type_id">
                    <option value>انتخاب نمایید...</option>
                    @foreach($types as $keyType=>$valueType)
                        <option data-url="{{ route('category.parent').'?type_id='.$keyType }}"
                                @if($category->type_id == $keyType) selected
                                @endif  value="{{ $keyType }}">{{ $valueType }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label>دسته ی والد</label>
                <select class="form-control category-parent" name="parent_id">
                    <option value>انتخاب نمایید...</option>
                    @foreach($parents as $parent)
                        <option @if($parent->id == $category->parent_id) selected @endif value="{{ $parent->id }}">{{ $parent->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <button type="button" class="btn btn-info store-category">ویرایش دسته بندی</button>
        </div>
    </div>
</form>
