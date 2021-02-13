@extends('master')

@section('title', 'گزارش ورود و خروج انبار')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">جستجو</h3>
            </div>
            <div class="card-body">
                <form method="GET">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">نوع</label>
                            <select name="type" class="form-control">
                                <option value>انتخاب نمایید ...</option>
                                <option @if (request()->query('type') == 'MRS') selected
                                    @endif value="MRS">MRS</option>
                                <option @if (request()->query('type') == 'MIV') selected
                                    @endif value="MIV">MIV</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">تاریخ از</label>
                            <input autocomplete="off" type="text" name="s_date" class="form-control datepicker"
                                value="{{ request()->query('s_date') }}">
                        </div>
                        <div class="col-md2">
                            <label for="">تاریخ تا</label>
                            <input autocomplete="off" type="text" name="e_date" class="form-control datepicker"
                                value="{{ request()->query('e_date') }}">
                        </div>
                        <div class="col">
                            <div class="form-group mt-4">
                                <button class="btn btn-primary">جستجو</button>
                                <a href="{{ route('report.warehouse') }}" class="btn btn-danger">بارگزارش مجدد</a>
                                <button target="_blank" type="submit" name='print' value='true' class="btn btn-info">چاپ <i
                                        class='fa fa-print'></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">گزارش ورود و خروج انبار</h3>
            </div>
            <div class="card-body">

                @if (request()->query() && request()->query('type') == 'MIV')
                    @include('supply.reports.partials.miv')
                @elseif(request()->query() && request()->query('type') == 'MRS')
                    @include('supply.reports.partials.mrs')
                @else
                    <div class="alert alert-info alert-dismissible text-center">
                        <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
                        برای نمایش گزارش فیلتر مورد نظر را انتخاب نمایید .
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
