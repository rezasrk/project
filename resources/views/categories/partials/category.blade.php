<table class="table table-bordered">
    <thead>
    <tr class="table-info">
        <th>ردیف</th>
        <th>عنوان</th>
        <th>نوع</th>
        <th>نوع دسته ی والد</th>
        <th>مدیریت</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ ( $categories->currentPage() - 1 ) * $categories->perPage() + $loop->iteration }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ optional($category->type)->value }}</td>
            <td>{{ optional($category->parent)->title }}</td>
            <td>
                @can('edit-categories')
                    <a class="fa fa-pencil-alt text-dark pointer edit-category"
                       data-url="{{ route('categories.edit',$category->id) }}"></a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $categories->appends(request()->query())->render() !!}
