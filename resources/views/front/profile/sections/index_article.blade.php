<div class="row">

    <div class="col-12">
        <div class="user-image">
            <!-- <img src="./assets/images/icon/icon-plus.svg" class="user-image__image" alt=""> -->
            <a href="{{ route('front.article').'?article_id=create' }}">
                <div class="user-image__icon">
                    <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas"
                         data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                    </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                </div>
                <label class="user-image__label">افزودن مقاله جدید</label>
            </a>
        </div>
    </div>

    <div class="col-12">
        <div class="section-head">
            <h3>لیست مقالات</h3>
        </div>

        <div class="articles__list">
            @if($articles->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>مجله</th>
                        <th>تعداد مجلات</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else

            @endif
        </div>
    </div>
</div>
