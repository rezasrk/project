@extends('master')

@section('title','اطلاعات')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">اطلاعات</h3>
            </div>
            <div class="card-body">
                <hr>
                <form method="post" action="{{ route('information.store') }}">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ادرس</label>
                                <input type="text" class="form-control" name="address" value="{{ $address->value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>تلفن</label>
                                <input type="text" class="form-control" name="phone" value="{{ $phone->value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ایمیل</label>
                                <input type="text" class="form-control" name="email" value="{{ $email->value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>تلفن همراه</label>
                                <input type="text" class="form-control" name="mobile" value="{{ $mobile->value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>کد پستی</label>
                                <input type="text" class="form-control" name="post_code" value="{{ $post_code->value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ساعت پاسخ گویی</label>
                                <input type="text" class="form-control" name="hours" value="{{ $hours->value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-info store-info" type="button">ثبت</button>
                            </div>
                        </div>
                    </div>
                </form>
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
