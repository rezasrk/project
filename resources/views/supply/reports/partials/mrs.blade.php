@if ($categories->count() > 0)
    <table class="{{ request()->query('print') ? 'print-table rtl' : 'table table-bordered' }}">
        <thead>
        <tr>
            <th colspan="1"><img width="70px" height="70px"
                                 src="{{ projectInf()->logo ? projectInf()->logo : '/images/company.png'  }}"></th>
            <th colspan="4" class="text-center" style="font-size: 25px"><b><h3>{{ env('APP_NAME') }}</h3>
                    <h5>{{ projectInf()->project_title }}</h5></b></th>
            <th colspan="1">تاریخ از : {{ request()->query('s_date') ? request()->query('s_date') : '---' }}</th>
            <th colspan="1">تاریخ تا : {{ request()->query('e_date') ? request()->query('e_date') : '---' }}</th>
        </tr>
        <tr>
            <th colspan="7" class="text-center">MRS</th>
        </tr>
        <tr>
            <th>ردیف</th>
            <th>شماره درخواست</th>
            <th>کد</th>
            <th>نام کالا</th>
            <th>مقدار</th>
            <th>واحد</th>
            <th>دیسپلین</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->request_code }}</td>
                <td>{{ $category->code }}</td>
                <td>{{ $category->complete_category }}</td>
                <td>{{ $category->amount }}</td>
                <td>{{ $category->unit_id != 46 ? $category->unit_value : '' }}</td>
                <td>{{ $category->discipline_id != 46 ? $category->discipline_value : '' }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot style="margin-top: 100px">
        <tr>
            <td colspan="3">امضاء مدیر پروژه</td>
            <td colspan="2">امضاء مسئول انبار</td>
            <td colspan="2">امضاء رئیس کارگاه</td>
        </tr>
        <tr style="height: 100px">
            <td colspan="3"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
        </tr>
        </tfoot>
    </table>
@else
    <div class="alert alert-warning alert-dismissible text-center">
        <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
        موردی برای نمایش یافت نشد !
    </div>
@endif
