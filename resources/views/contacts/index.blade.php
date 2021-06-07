@extends('master')

@section('title','پیام ها')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">پیام ها</h3>
            </div>
            <div class="card-body">
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr class="table-info">
                        <th>ردیف</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>تلفن</th>
                        <th>موضوع</th>
                        <th>پیام</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr @if($message->read_at)  class="table-active" @endif>
                            <td>{{ (($messages->currentPage() - 1) * $messages->perPage()) + $loop->iteration }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->mobile }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $messages->appends(request()->query())->render() !!}
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>

    </script>
@endsection
