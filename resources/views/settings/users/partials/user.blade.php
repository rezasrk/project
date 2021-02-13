<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr class="table-info">
            <th>ردیف</th>
            <th>نام</th>
            <th>نام کاربری</th>
            <th>پست الکترونیکی</th>
            <th>نقش</th>
            <th>نام پروژه</th>
            <th>مدیریت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ ($users->currentPage() -  1) * $users->perPage() + $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ optional($user->roles()->first())->name }}</td>
                <td>{{ implode(' , ',$user->projects()->get()->pluck('project_title')->toArray()) }}</td>
                <td>
                    <a class="fa fa-pencil-alt text-dark edit-user pointer"
                       data-url="{{ route('users.edit',$user->id) }}"></a>
                    @can('login-as-user')
                        <a class="text-dark" href="{{ route('loginAsUser',$user->id) }}"><b>login</b></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $users->appends(request()->query())->render() !!}
</div>
