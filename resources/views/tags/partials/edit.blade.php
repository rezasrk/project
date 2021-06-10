<form action="{{ route('tags.update',$tag->id) }}">
    <input type="hidden" value="{{ $tag->id }}" name="tag_id">
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <label>عنوان</label>
            <input type="text" class="form-control" name="title" value="{{ $tag->title }}">
        </div>
        <div class="col-md-6 mt-4">
            <div class="form-group float-right">
                <button class="btn btn-info update-tag" type="button"> ویرایش برچسب</button>
            </div>
        </div>
    </div>
</form>
