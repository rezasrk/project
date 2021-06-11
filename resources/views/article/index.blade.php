@extends('master')

@section('title','مقاله')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">مقاله</h3>
            </div>
            <div class="card-body">
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr class="table-info">
                        <th>ردیف</th>
                        <th>عنوان مقاله</th>
                        <th>عنوان مجله</th>
                        <th>تاریخ ثبت</th>
                    </tr>
                    </thead>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ optional($article->journal)->journal_title }}</td>
                            <td>{{ $article->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
                {!! $articles->appends(request()->query())->render() !!}
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>

    </script>
@endsection
