<div class="col-12">
    <div class="user-image">
        <a href="{{ route('front.journal').'?type=create' }}">
            <div class="user-image__icon">
                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas"
                     data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                     data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
            </div>
            <label class="user-image__label">افزودن مجله جدید</label>
        </a>
    </div>
</div>
<div class="col-md-12 mt-4">
    <div class="section-head">
        <h3>لیست مجلات</h3>
    </div>
    @if($journals->count())
        <div class="magazines__list">

            <table class="table">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>عنوان</th>
                    <th>ناشر</th>
                    <th>مدیریت</th>
                </tr>
                </thead>

                <tbody>
                @foreach($journals as $jrn)
                    <tr>
                        <td>{{ ($journals->currentPage() - 1) * $journals->perPage() + $loop->iteration }}</td>
                        <td>{{ $jrn->journal_title }}</td>
                        <td>{{ optional($jrn->publish)->title }}</td>
                        <td>
                            <a href="{{ route('front.journal').'?type=create&journal_id='.$jrn->id }}"
                               class="btn btn-info"
                               style="color: #ffffff">ویرایش</a>
                            <a href="{{ route('front.journal').'?type=numbers&journal_id='.$jrn->id }}"
                               class="btn btn-success" style="color: #ffffff">افزودن شماره</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
@endif
