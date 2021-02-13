<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
</head>

<body>
<table class="print-table rtl">
    <thead>
    <tr>
        <th colspan>
            <img width="70px" height="70px"
                 src="{{ projectInf()->logo  ?  : '/images/company.png' }}">
        </th>
        <th colspan="4"><b><h3>{{ env('APP_NAME') }}</h3><h5>{{ projectInf()->project_title }}</h5></b></th>
        <th>تاریخ درخواست : {{ $morilog->gregorianToJalali($rq->created_at) }}</th>
        <th>شماره درخواست : {{ $rq->code }}</th>
    </tr>
    <tr>
        <th colspan="2">موضوع : {{ $rq->subject  }}</th>
        <th colspan="2">نوع درخواست : {{ $rq->typ->value }}</th>
        <th colspan="3">وضعیت درخواست : {{ $rq->stat->value  }}</th>
    </tr>
    <tr>
        <th>ردیف</th>
        <th>کالا</th>
        <th>نام کالا</th>
        <th>مقدار</th>
        <th>دیسیپلین</th>
        <th>واحد</th>
        <th>شرح</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rq->details as $detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $detail->category->code }}</td>
            <td>{{ $detail->category->complete_category_title }}</td>
            <td>{{ $detail->amount }}</td>
            <td>{{ optional($detail->category->discipline)->value }}</td>
            <td>{{ optional($detail->category->unit)->value }}</td>
            <td>{{ $detail->description }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="2">درخواست کننده</td>
        <td colspan="3">مدیر پروژه</td>
        <td colspan="2">مدیر تامین</td>
    </tr>
    <tr style="height: 100px">
        <td colspan="2"></td>
        <td colspan="3"></td>
        <td colspan="2"></td>
    </tr>
    </tfoot>
</table>
</body>

</html>
