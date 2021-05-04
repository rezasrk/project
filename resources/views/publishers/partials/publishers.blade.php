@if($publishers->count())
    <table class="table table-bordered">
        <thead>
        <tr class="table-info">
            <th>ردیف</th>
            <th>عنوان نشریه</th>
            <th>ثبت شده توسط</th>
            <th>وضعیت</th>
            <th>تاریخ ثبت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($publishers as $publisher)
            <tr>
                <td>{{ ( $publishers->currentPage() - 1 ) * $publishers->perPage()  + $loop->iteration}}</td>
                <td>{{ $publisher->title }}</td>
                <td>{{ optional($publisher->creator)->name }}</td>
                <td>
                    <input type="checkbox"
                           data-url="{{  $publisher->status ? route('publisher.normal').'?id='.$publisher->id : route('publisher.accept').'?id='.$publisher->id }}"
                           class="status-publisher" @if($publisher->status) checked @endif value="{{ $publisher->id }}">
                    {{ $publisher->publisher_status }}
                </td>
                <td>{{ $publisher->created_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $publishers->appends(request()->query())->render() !!}
@else
    @include('partials.empty_table')
@endif
