<table class="table table-bordered">
    <thead>
    <tr>
        <td>نام نشریه</td>
        <td>{{ $publisher->title }}</td>
    </tr>
    <tr>
        <td>آدرس نشریه</td>
        <td>{{ $publisher->address }}</td>
    </tr>
    <tr>
        <td>شماره تماس</td>
        <td>{{ $publisher->phone }}</td>
    </tr>
    <tr>
        <td>پست الکترونیکی</td>
        <td>{{ $publisher->email }}</td>
    </tr>
    <tr>
        <td>ادرس اینترنتی</td>
        <td>{{ $publisher->web_site }}</td>
    </tr>
    <tr>
        <td>درباره ی ناشر</td>
        <td>{{ $publisher->about }}</td>
    </tr>
    <tr>
        <td>تصویر مجوز انتشار</td>
        <td>
            <img width="100px" height="100px" src="{{ url('storage/'.$publisher->license) }}">
            <hr>
            <a target="_blank" href="{{ route('simple.download')."?path=".$publisher->license }}">لینک دانلود</a>
        </td>
    </tr>
    <tr>
        <td>تصویر نامه ی درخواست</td>
        <td>
            <img width="100px" height="100px" src="{{ url('storage/'.$publisher->letter) }}">
            <hr>
            <a target="_blank" href="{{ route('simple.download')."?path=".$publisher->letter }}">لینک دانلود</a>
        </td>
    </tr>
    @if($publisher->image)
        <tr>
            <td>لوگو</td>
            <td>
                <img width="100px" height="100px" src="{{ url('storage/'.$publisher->image) }}">
                <hr>
                <a target="_blank" href="{{ route('simple.download')."?path=".$publisher->image }}">لینک دانلود</a>
            </td>
        </tr>
    @endif
    </thead>
</table>
