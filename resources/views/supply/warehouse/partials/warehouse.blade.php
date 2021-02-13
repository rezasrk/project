<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr class="table-info">
            <th>ردیف</th>
            <th>کالا</th>
            <th>واحد</th>
            <th>دیسیپلین</th>
            <th>MRS</th>
            <th>MIV</th>
            <th>MRV</th>
            <th>موجودی انبار</th>
            <th>مدیریت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($warehouse as $item)
            <tr>
                <td>{{ ( $warehouse->currentPage() - 1 ) * $warehouse->perPage() + $loop->iteration }}</td>
                <td>{{ $item->complete_title }}</td>
                <td></td>
                <td></td>
                <td>{{ $item->mrs }}</td>
                <td>{{ $item->miv }}</td>
                <td>{{ $item->mrv }}</td>
                <td>{{ $item->exists_warehouse }}</td>
                <td>
                    <a class="text-primary pointer warehouse-action"
                       data-url="{{ route('miv.show',$item->categoryId) }}">MIV</a>
                    <a class="text-danger pointer warehouse-action"
                       data-url="{{ route('mrv.show',$item->categoryId) }}">MRV</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $warehouse->appends(request()->query())->render() !!}
</div>
