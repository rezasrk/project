@if($users->count())
<table class="table table-bordered">
    <thead>
    <tr class="table-info">
        <th>ردیف</th>
        <th>نام و نام خانوادگی</th>
        <th>نام کاربری</th>
        <th>نویسنده</th>
        <th>مدرک تحصیلی</th>
        <th>درجه ی علمی</th>
        <th>عضو شورای بررسی متون</th>
        <th>پست الکترونیکی</th>
        <th>وب سایت شخصی</th>
        <th>تایید</th>
        <th>مدیریت</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ ( $users->currentPage() - 1 ) * $users->perPage() + $loop->iteration  }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>
                @if($user->as_creator)
                    ثبت به عنوان نویسنده
                @else
                    ---
                @endif
            </td>
            <td>{{ optional($user->userDegree)->value }}</td>
            <td>{{ optional($user->userScientificRank)->value }}</td>
            <td>
                <input @if($user->preview != '') checked @endif type="checkbox" class="preview-text" data-url="{{ route('preview',$user->id) }}">
            </td>
            <td>{{ $user->email }}</td>
            <td>
                <input type="checkbox" class="confirmed"   data-url="{{ route('users.confirmed',$user->id) }}" @if($user->email_verified_at) checked @endif>
            </td>
            <td>{{ $user->website }}</td>
            <td>
                <a class="text-dark edit-user pointer" data-url="{{ route('users.edit',$user->id) }}">
                    <i class="fa fa-pencil-alt"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $users->appends(request()->query())->render() !!}
@else
@include('partials.empty_table')
@endif
