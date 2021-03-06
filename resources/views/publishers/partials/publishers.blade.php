@if($publishers->count())
    <table class="table table-bordered">
        <thead>
        <tr class="table-info">
            <th>ردیف</th>
            <th>عنوان نشریه</th>
            <th>ثبت شده توسط</th>
            <th>وضعیت</th>
            <th>تاریخ ثبت</th>
            <th>مدیریت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($publishers as $publisher)
            <tr>
                <td>{{ ( $publishers->currentPage() - 1 ) * $publishers->perPage()  + $loop->iteration}}</td>
                <td>
                    <a href="{{ route('front.page.publisher.show',$publisher->id) }}">{{ $publisher->title }}</a>
                </td>
                <td>{{ optional($publisher->creator)->name }}</td>
                <td>
                    <input type="checkbox"
                           data-url="{{  $publisher->status ? route('publisher.normal').'?id='.$publisher->id : route('publisher.accept').'?id='.$publisher->id }}"
                           class="status-publisher" @if($publisher->status) checked @endif value="{{ $publisher->id }}">
                    {{ $publisher->publisher_status }}
                </td>
                <td>{{ $publisher->created_date }}</td>
                <td>
                    <a data-url="{{ route('publisher.show',$publisher->id) }}"
                       class="fa fa-eye show-publisher-detail pointer"></a>
                    <a data-url="{{ route('publishers.edit',$publisher->id) }}"
                       class="fa fa-pencil-alt edit-publisher pointer"></a>
                    <a class="delete-publisher" data-url="{{ route('publishers.destroy',$publisher->id) }}">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $publishers->appends(request()->query())->render() !!}
@else
    @include('partials.empty_table')
@endif
