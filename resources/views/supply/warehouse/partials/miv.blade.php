<div class="card card-primary">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <span><b>نام کالا :</b>{{ $category->complete_category_title }}</span>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <span><b>واحد کالا : </b>{{ $category->unit->value }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('miv') }}" method="POST">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>مقدار</label>
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <input type="text" class="form-control" name="amount"
                               value="{{ isset($storeDetail->amount) ? $storeDetail->amount :'' }}">
                        <input type="hidden" name="store_detail_id"
                               value="{{ isset($storeDetail->id) ? $storeDetail->id : 0 }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>شماره miv</label>
                        <input type="text" class="form-control" name="request_detail_no"
                               value="{{ isset($storeDetail->request_detail_no) ? $storeDetail->request_detail_no :'' }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>تاریخ</label>
                        <input type="text" autocomplete="off" class="form-control datepicker" name="date"
                               value="{{ isset($storeDetail->date) ? $storeDetail->date :'' }}">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea rows="1" class="form-control"
                                  name="description">{{ isset($storeDetail->description) ? $storeDetail->description :'' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="button" data-url="{{ route('miv.show',[$category->id,$requestId]) }}"
                                class="btn btn-info store-warehouse">
                            ثبت miv
                        </button>
                        @if($requestId)
                            <button type="button" data-url="{{ route('mrs.show',$requestId) }}"
                                    class="btn btn-info back-to-mrs">
                                مشاهده ی MRS
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
        <hr>
        @if($mivs->count() > 0)
            <div class="row table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr class="table-info">
                        <th>ردیف</th>
                        <th>مقدار</th>
                        <th>شماره miv</th>
                        <th>تاریخ</th>
                        <th>شرح</th>
                        <th>فعالیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mivs as $miv)
                        <tr>
                            <td>{{ ($mivs->currentPage() - 1) * $mivs->perPage() + $loop->iteration }}</td>
                            <td>{{ $miv->amount }}</td>
                            <td>{{ $miv->request_detail_no }}</td>
                            <td>{{ $miv->date }}</td>
                            <td>{{ $miv->description }}</td>
                            <td>
                                <a class="fa fa-pencil-alt text-dark pointer edit-warehouse"
                                   data-url="{{ route('miv.show',[$miv->category_id,$requestId]).'?store_detail='.$miv->id }}"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="warehouse">
                    {!! $mivs->appends(request()->query())->render() !!}
                </div>
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
    </div>
</div>
