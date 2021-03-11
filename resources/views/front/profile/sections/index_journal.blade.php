<div class="col-md-12">
    <div class="form-group text-center" >
        <a class="btn btn-success" href="{{ route('front.journal').'?journal_id=create' }}">ثبت مجله جدید</a>
    </div>
</div>
<div class="col-md-12 mt-4">
    <div class="section-head">
        <h3>لیست مجلات</h3>
    </div>

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
                    <td>{{ optional($jrn->publisherTitle)->value }}</td>
                    <td>
                        <a href="{{ route('front.journal').'?journal_id='.$jrn->id }}" class="btn btn-info">ویرایش</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
