<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="table-info">
            <th>ردیف</th>
            <th>انتخاب</th>
            <th>کد</th>
            <th>موضوع</th>
            <th>وضعیت درخواست</th>
            <th>نوع درخواست</th>
            <th>درخواست کننده</th>
            <th>ثبت کننده</th>
            <th>تاریخ ثبت</th>
            <th>مدیریت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ ($requests->currentPage() - 1 ) * $requests->perPage() + $loop->iteration }}</td>
                <td>
                    <input class="get-request-ids" type="checkbox" value="{{ $request->id }}">
                </td>
                <td>{{ $request->code }}</td>
                <td>{{ $request->subject }}</td>
                <td>{{ optional($request->stat)->value }}</td>
                <td>{{ optional($request->typ)->value }}</td>
                <td>{{ $request->applicant_name }}</td>
                <td>{{ $request->user->name }}</td>
                <td>{{ $morilog->gregorianToJalali($request->created_at) }}</td>
                <td>
                    @can('edit-request')
                        <a title="ویرایش" class="fa fa-pencil-alt  edit-request pointer"
                           data-url="{{route('request.edit', $request->id)}}"></a>
                    @endcan
                    @can('create-mrs')
                        <a title="MRS" class="text-dark pointer mrs"
                           data-url="{{ route('mrs.show',$request->id) }}">MRS</a>
                    @endcan
                    @can('upload-document-requests')
                        <a class="fa fa-upload  pointer attachment"
                           data-url="{{ route('action.attachmentShow') . '?request_id=' . $request->id }}"></a>
                    @endcan
                    @can('print_request')
                        <a title="چاپ درخواست" class="fa fa-print text-dark pointer"
                           href="{{ route('action.requestPrint') . '?request_id=' . $request->id }}"></a>
                    @endcan
                    <a title="یادداشت" class="fa fa-comment request-comment text-dark pointer"
                       data-url="{{ route('action.requestCommentForm') . '?request_id=' . $request->id }}"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $requests->appends(request()->query())->render() !!}
</div>
