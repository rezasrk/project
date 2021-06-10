@extends('master')

@section('title','ناشران')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">نشریات</h3>
            </div>
            <div class="card-body">

                @include('publishers.partials.filter')
                <div class="row">
                    <div class="col-md-12">
                        @include('publishers.partials.publishers')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('change', '.status-publisher', function () {
            httpGetRequest($(this).attr('data-url'));
            removeContentLoading();
        });

        $(document).on('click', '.show-publisher-detail', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                if (response.status === 200) {
                    showModal({
                        title: 'اطلاعات نشریه ',
                        body: response.data
                    });
                }
                removeContentLoading();
            })
        });

        $(document).on('click', '.edit-publisher', function () {

            httpGetRequest($(this).attr('data-url')).done(function (response) {
                showModal({
                    title: 'ویرایش',
                    body: response.data
                })
                removeContentLoading();
            });
        });

        $(document).on('click', '.update-publisher', function () {
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

        $(document).on('click', '.delete-publisher', function () {
            swal({
                title: "آیا از درخواست خود اطمینان دارید؟",
                text: "در صورت حذف این مورد دیگر به ان دسترس نخواهید داشت",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    setContentLoading();
                    if (willDelete) {
                        httpPostRequest($(this).attr('data-url'), {_method: 'delete'}).done(function (response) {
                            if (response.status === 200) {
                                successAlert(response.msg)
                                setTimeout(function () {
                                    window.location.reload();
                                }, 2000)
                            }
                            removeContentLoading();
                        })
                    }
                });

        });
    </script>
@endsection



