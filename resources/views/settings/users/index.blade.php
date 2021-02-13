@extends('master')

@section('title',trans('title.user-title'))
@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">{{ trans('title.user-title') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @can('create-users')
                            <button
                                class="btn btn-success add-user">{!! trans('button.create-user') !!}</button>
                        @endcan
                    </div>
                </div>
                <hr>
                @include('settings.users.partials.user')
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>

        $(document).on('click', '.add-user', function () {
            httpGetRequest("{{ route('users.create') }}").done(function (response) {
                if (response.status === 200) {
                    showModal({
                        body: response.data,
                        title: 'ثبت کاربر'
                    });
                    removeContentLoading();
                    createSelect2();
                }
            })
        });

        $(document).on('click', '.store-user', function () {
            setModalLoading();
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg);
                }
                removeModalLoading();
            });
        });

        $(document).on('click', '.edit-user', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                if (response.status === 200) {
                    showModal({
                        body: response.data,
                        title: 'ویرایش کاربر'
                    })
                    createSelect2();
                }
                removeContentLoading()
            });
        })
    </script>
@endsection
