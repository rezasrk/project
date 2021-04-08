<div class="section-head">
    <h3>شماره ها</h3>
</div>
<form action="{{ route('journalNumberStore') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="title" placeholder="عنوان را وارد کنید::." class="form-control"
                       value="{{ optional($numberJr)->title }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="hidden" name="journal_id" value="{{ request()->query('journal_id') }}">
                <input type="hidden" name="journal_number_id" value="{{ request()->query('journal_number') }}">
                <input type="text" name="year" placeholder="سال::." class="form-control" value="{{ optional($numberJr)->year }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="number" placeholder="شماره::." class="form-control"
                       value="{{ optional($numberJr)->number }}">
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <button type="button" class="btn btn-success store-journal">ثبت شماره مجله</button>
        </div>
    </div>
</form>
@if(!empty($journalNumbers) && $journalNumbers->count())
    <hr>
    <div class="magazines__list">

        <table class="table">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>سال</th>
                <th>شماره</th>
                <th>مدیریت</th>
            </tr>
            </thead>
            @foreach($journalNumbers as $journalNumber)
                <tr>
                    <td style="width: 10%;">{{ $loop->iteration }}</td>
                    <td style="width: 20%;">{{ $journalNumber->title }}</td>
                    <td style="width: 10%;">{{ $journalNumber->year }}</td>
                    <td style="width: 10%;">{{ $journalNumber->number }}</td>
                    <td style="width: 10%;">
                        <a class="btn btn-info" style="color: #ffffff"
                           href="{{ route('front.journal').'?journal_number='.$journalNumber->id.'&type=numbers&journal_id='.$journalNumber->journal_id }}">
                            ویرایش
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
