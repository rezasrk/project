<table class="table table-bordered">
    <thead>
    <tr class="table-info">
        <th>ردیف</th>
        <th>نام و نام خانوادگی</th>
        <th>پست الکترونیکی</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ ( $users->currentPage() - 1 ) * $users->perPage() + $loop->iteration  }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $users->appends(request()->query())->render() !!}
