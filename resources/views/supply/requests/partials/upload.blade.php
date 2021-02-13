<form action="{{ route('action.attachment') }}" method="POST">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>عنوان فایل</label>
                <input type="text" class="form-control" name="title"
                       value="{{ isset($attach->title) ? $attach->title :'' }}">
                <input type="hidden" name="request_id" value="{{ $requestId }}">
                <input type="hidden" name="file_id" value="{{ isset($attach->id)  ? $attach->id : 0  }}">
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label>نوع فایل</label>
                <select class="form-control" name="type">
                    <option value>انتخاب نمایید...</option>
                    @foreach($types as $keyType=>$valueType)
                        <option @if(isset($attach->id) && $attach->id = $keyType) selected
                                @endif value="{{$keyType}}">{{$valueType}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>آپلود فایل</label>
                <input type="file" class="form-control" name="attachment"
                       value="{{ isset($attach->path) ? $attach->path : '' }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-info upload-file"
                        data-url="{{ route('action.attachmentShow').'?request_id='.$requestId }}">ثبت
                </button>
            </div>
        </div>
    </div>
</form>
<hr>
@if($files->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr class="table-info">
                <th>ردیف</th>
                <th>عنوان</th>
                <th>نوع</th>
                <th>فایل</th>
                <th>فعالیت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $file->title }}</td>
                    <td>{{ optional($file->typeFile)->value  }}</td>
                    <td>

                        <a title="لینک دانلود" target="_blank"
                           href="{{ route('simple.download').'?path='.$file->path }}"
                           class="fa fa-download text-dark">
                        </a>
                    </td>
                    <td>
                        <a class="fa fa-pencil-alt text-dark edit-file pointer"
                           data-url="{{ route('action.attachmentShow')."?request_id={$requestId}&file_id=".$file->id }}"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">
                موردی برای نمایش یافت نشد !!
            </div>
        </div>
    </div>
@endif
