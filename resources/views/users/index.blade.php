@extends('master')

@section('title','کاربران')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">جستجو</h3>
            </div>
            <div class="card-body">
                @include('users.partials.filter')
            </div>
        </div>
    </section>

    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">کاربران</h3>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <a data-url="{{ route('users.create') }}" class="btn btn-success text-white add-user">ثبت کاربر
                            جدید</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('users.partials.users')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '.edit-user', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                if (response.status === 200) {
                    showModal({
                        title: 'ویرایش کاربر',
                        body: response.data
                    });
                }
                removeContentLoading();
            })
        });

        $(document).on('click', '.update-user', function () {
            setModalLoading();
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg);
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000)
                }
                removeModalLoading();
            })
        });

        $(document).on('change', '.preview-text', function () {
            var elementCheck = $(this)
            if (elementCheck.prop('checked') === true) {
                httpPostRequest(elementCheck.attr('data-url'), {preview: 1})
            } else {
                httpPostRequest(elementCheck.attr('data-url'), {preview: 0})
            }
        })

        $(document).on('click', '.add-user', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                if (response.status === 200) {
                    showModal({
                        title: 'اضافه کردن کاربر',
                        body: response.data
                    });
                }
                removeContentLoading()
            });
        });
    </script>
@endsection
