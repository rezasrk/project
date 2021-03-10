@if($journals->count())
    <table class="table table-bordered">
        <thead>
        <tr class="table-info">
            <th>ردیف</th>
            <th>عنوان نشریه</th>
            <th>صاحب امتیاز نشریه</th>
            <th>تقاضا کننده</th>
            <th>سمت تقاضا کننده</th>
            <th>ثبت شده توسط</th>
            <th>وضعیت</th>
            <th>تاریخ ثبت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($journals as $journal)
            <tr>
                <td>{{ ( $journals->currentPage() - 1 ) * $journals->perPage()  + $loop->iteration}}</td>
                <td>{{ $journal->journal_title }}</td>
                <td>{{ $journal->owner_journal }}</td>
                <td>{{ $journal->requester }}</td>
                <td>{{ optional($journal->rankRequester)->value }}</td>
                <td>{{ optional($journal->creator)->name }}</td>
                <td>
                    <input type="checkbox"
                           data-url="{{  $journal->status ? route('journals.normal').'?id='.$journal->id : route('journals.accept').'?id='.$journal->id }}"
                           class="status-journal" @if($journal->status) checked @endif value="{{ $journal->id }}">
                    {{ $journal->journal_status }}
                </td>
                <td>{{ $journal->created_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    @include('partials.empty_table')
@endif
