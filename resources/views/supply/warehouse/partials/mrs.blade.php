@foreach($details as $detail)
    <div class="card card-info">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <span><b> نام کالا : </b></span>{{ $detail->category->complete_category_title }}
                        <div>
                            <input type="hidden" name="category_id" value="{{ $detail->category->id }}">
                            <input type="hidden" name="request_detail_id" value="{{ $detail->id }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <span><b>واحد : </b>{{ optional($detail->category->unit)->value }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <span><b>مقدار :</b> </span>{{ $detail->amount }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if($detail->MRS()->count() > 0)
                @foreach($detail->MRS()->get() as $mrs)
                    @include('supply.warehouse.partials.form_mrs')
                    <hr class="border-hr-info">
                    @php
                        $mrs = null
                    @endphp
                @endforeach
            @else
                @include('supply.warehouse.partials.form_mrs')
            @endif
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-warning add-new-mrs-form">افزودن فرم جدید</button>
                        <button type="button" class="btn btn-danger remove-mrs-form">حذف فرم</button>
                        <span data-url="{{ route('miv.show',[$detail->category_id,$detail->request_id]) }}"
                              class="btn btn-primary pointer show-miv">مشاهده ی MIV</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="warehouse">
    {!! $details->appends(request()->query())->render() !!}
</div>
