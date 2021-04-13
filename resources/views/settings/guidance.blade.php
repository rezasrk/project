@extends('master')

@section('title','راهنمای سایت')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">راهنمای سایت</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('guidance') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>عنوان</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>تصویر </label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>شرح</label>
                                <textarea type="text" name="description" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button class="btn btn-info store-info" type="button">ثبت راهنمایی</button>
                            </div>
                        </div>
                    </div>
                </form>
            @foreach($guidances as $guidance)
                <div class="row mt-4">
                    <div class="col-md-12 mt-1">
                        {{ $loop->iteration.' ) ' }}<label class="form-control">{{ $guidance->subject }}</label>
                    </div>
                    <div class="col-md-12 mt-1">
                        {{ $guidance->description}}
                    </div>
                    @if($guidance->path)
                        <div class="col-md-12 mt-1">
                            <img width="100%" class="help-block" src="{{ url('storage/'.$guidance->path) }}">
                        </div>
                    @endif
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '.store-info', function () {
            setContentLoading();
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status == 200) {
                    successAlert(response.msg)
                }
                removeContentLoading();
                setTimeout(function () {
                    window.location.reload();
                }, 2000)

            })
        });
    </script>
@endsection
