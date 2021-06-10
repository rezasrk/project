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
                    <th>مدیریت</th>
                </tr>
                </thead>
                @foreach($journals as $journal)
                    <tr>
                        <td>{{ ( $journals->currentPage() - 1 ) * $journals->perPage() + $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('front.page.journal.show',$journal->id) }}">{{ $journal->journal_title }}</a>
                        </td>
                        <td>{{ optional($journal->publish)->title }}</td>
                        <td>{{ $journal->create_date }}</td>
                        <td>
                            <a class="pointer delete-journal" data-url="{{ route('journal.destroy',$journal->id) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $journals->appends(request()->query())->render() !!}
        </div>
    </div>
@else
    @include('partials.empty_table')
@endif
