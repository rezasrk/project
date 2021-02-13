<form action="{{ route('categories.update',$category->id) }}" method="post">
    {!! method_field('patch') !!}
    <div class="row category-sample-form-category">
        <div class="col mt-4">
            <input @if($category->is_product) checked @endif type="checkbox" name="is_product">
            <label>نام اصلی کالا</label>
        </div>
        <div class="col">
            <label>عنوان کدینگ</label>
            <input type="text" class="form-control" autocomplete="off" name="category_title"
                   value="{{ $category->category_title }}">
        </div>
        <div class="col">
            <label>دیسیپلین</label>
            <select class="form-control" name="discipline_id">
                <option value>انتخاب نمایید...</option>
                @foreach($disciplines as $disKey=>$disValue)
                    <option @if($category->discipline_id == $disKey) selected
                            @endif value="{{ $disKey }}">{{ $disValue }}</option>
                @endforeach
            </select>
        </div>
        <div class="col"><label>واحد</label>
            <select class="form-control" name="unit_id">
                <option value>انتخاب نمایید...</option>
                @foreach($units as $unitKey=>$unitValue)
                    <option @if($category->unit_id == $unitKey) selected
                            @endif value="{{ $unitKey }}">{{ $unitValue }}</option>
                @endforeach

            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button class="btn btn-info update-category" type="button"> ویرایش کدینگ</button>
        </div>
    </div>
</form>
