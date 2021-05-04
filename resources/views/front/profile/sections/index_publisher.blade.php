<div class="row">

    <div class="col-12">
        <div class="user-image">
            <a href="{{ route('front.publisher').'?type=create' }}">
                <div class="user-image__icon">
                    <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas"
                         data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                    </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                </div>
                <label class="user-image__label">افزودن نشریه جدید</label>
            </a>
        </div>
    </div>

    <div class="col-12">
        <div class="section-head">
            <h3>لیست نشریات</h3>
        </div>
        @if($publishers->count())
            <div class="Journals__list">

                <table class="table">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>تعداد مجلات</th>
                        <th>مدیریت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publishers as $publish)
                        <tr>
                            <td>{{ ( $publishers->currentPage() - 1 ) * $publishers->perPage()  + $loop->iteration }}</td>
                            <td>{{ $publish->title }}</td>
                            <td>{{ $publish->journalCount }}</td>
                            <td>
                                <a href="{{ route('front.publisher').'?type=create&publisher_id='.$publish->id }}"
                                   class="btn btn-info" style="color: #FFFFFF">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $publishers->appends(request()->query())->render() !!}
            </div>
        @endif
    </div>
</div>
