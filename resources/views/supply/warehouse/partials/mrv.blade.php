<div class="card card-danger">
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
        <form action="{{ route('mrv') }}" method="POST">
            <div class="row">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>مقدار</label>
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <input type="text" class="form-control" name="amount"
                               value="{{ isset($storeDetail->amount) ? $storeDetail->amount :'' }}">
                        <input type="hidden" name="store_detail_id"
                               value="{{ isset($storeDetail->id) ? $storeDetail->id : 0 }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>شماره mrv</label>
                        <input type="text" class="form-control" name="request_detail_no"
                               value="{{ isset($storeDetail->request_detail_no) ? $storeDetail->request_detail_no :'' }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>تاریخ</label>
                        <input type="text" autocomplete="off" class="form-control datepicker" name="date"
                               value="{{ isset($storeDetail->date) ? $storeDetail->date :'' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea class="form-control"
                                  name="description">{{ isset($storeDetail->description) ? $storeDetail->description :'' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="button" data-url="{{ route('mrv.show',$category->id) }}"
                                class="btn btn-info store-warehouse">
                            ثبت mrv
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        @if($mrvs->count() > 0)
            <div class="row table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr class="table-info">
                        <th>ردیف</th>
                        <th>مقدار</th>
                        <th>شماره mrv</th>
                        <th>تاریخ</th>
                        <th>شرح</th>
                        <th>فعالیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mrvs as $mrv)
                        <tr>
                            <td>{{ ($mrvs->currentPage() - 1) * $mrvs->perPage() + $loop->iteration }}</td>
                            <td>{{ $mrv->amount }}</td>
                            <td>{{ $mrv->request_detail_no }}</td>
                            <td>{{ $mrv->date }}</td>
                            <td>{{ $mrv->description }}</td>
                            <td>
                                <a class="fa fa-pencil-alt text-dark pointer edit-warehouse"
                                   data-url="{{ route('mrv.show',$mrv->category_id)."?store_detail=".$mrv->id }}"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="warehouse">
                    {!! $mrvs->appends(request()->query())->render() !!}
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
