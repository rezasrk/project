@if($journals->count())
    <div class="col-md-12">
        <div class="form-group">
            <table class="table table-bordered">
                <thead>
                <tr class="table-info">
                    <th>ردیف</th>
                    <th>عنوان مجله</th>
                    <th>نشریه</th>
                    <th>تاریخ ثبت</th>
                </tr>
                </thead>
                @foreach($journals as $journal)
                    <tr>
                        <td>{{ ( $journals->currentPage() - 1 ) * $journals->perPage() + $loop->iteration }}</td>
                        <td>{{ $journal->journal_title }}</td>
                        <td>{{ optional($journal->publish)->publisher_title }}</td>
                        <td>{{ $journal->create_date }}</td>
                    </tr>
                @endforeach
            </table>
            {!! $journals->appends(request()->query())->render() !!}
        </div>
    </div>
@else
    @include('partials.empty_table')
@endif
