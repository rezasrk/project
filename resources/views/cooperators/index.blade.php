@extends('master')

@section('title','همکاران')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">همکاران</h3>
            </div>
            <div class="card-body">
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success add-cooperator" data-url="{{ route('cooperator.create') }}">ثبت
                            همکار جدید
                        </button>
                    </div>
                </div>
                @if($cooperators->count())
                    <div class="row mt-4">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-info">
                                <th>ردیف</th>
                                <th>نام همکار</th>
                                <th>عکس</th>
                                <th>مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cooperators as $cooperator)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cooperator->value }}</td>
                                    <td>
                                        <img width="100px" height="100px"
                                             src="{{ url('storage/'.json_decode($cooperator->extra_value)->url) }}">
                                    </td>
                                    <td>
                                        <a class="text-danger delete-cooperator pointer"
                                           data-url="{{ route('cooperators.destroy',$cooperator->id) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '.add-cooperator', function () {
            var elementClick = $(this);
            httpGetRequest(elementClick.attr('data-url')).done(function (response) {
                showModal({
                    title: 'اضافه کردن همکار جدید',
                    body: response.data
                });
                removeContentLoading();
            });
        });

        $(document).on('click', '.store-cooperator', function () {
            httpFormPostRequest($(this)).done(function (response) {
                setModalLoading();
                if (response.status === 200) {
                    successAlert(response.msg);
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000)
                }
                removeModalLoading();
            });
        });

        $(document).on('click', '.delete-cooperator', function () {
            swal({
                title: "از حذف این مورد اطمینان دارید ؟",
                text: "در صورت حذف این مورد دیگر امکان دسترسی به ان را نخواهید داشت",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        setContentLoading();
                        httpPostRequest($(this).attr('data-url')).done(function (response) {
                            if (response.status === 200) {
                                successAlert(response.msg)
                                setTimeout(function () {
                                    window.location.reload()
                                }, 2000)
                            }
                            removeContentLoading();
                        })
                    }
                });


        });
    </script>
@endsection
