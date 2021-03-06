@extends('master')

@section('title','کلید واژه ها')

@section('content')

    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">کلید واژه</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tags.store') }}" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <label>عنوان برچسب</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="col-md-8 mt-4">
                            <div class="form-group float-right">
                                <button class="btn btn-info store-tags" type="button">ثبت برچسب</button>
                            </div>
                        </div>
                    </div>
                </form>
                @if($tags->count())
                    <hr>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="table-info">
                                    <th>ردیف</th>
                                    <th>عنوان کلید واژه</th>
                                    <th>مدیریت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ ($tags->currentPage() - 1) * $tags->currentPage() + $loop->iteration }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td>
                                            <a data-url="{{ route('tags.edit',$tag->id) }}"
                                               class="pointer fa fa-pencil-alt text-dark edit-tags"></a>

                                            <a data-url="{{ route('tags.destroy',$tag->id) }}"
                                               class="pointer fa fa-trash text-dark delete-tag"></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $tags->appends(request()->query())->render() !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '.store-tags', function () {
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg);
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000)
                }
            })
        });

        $(document).on('click', '.edit-tags', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                if (response.status === 200) {
                    showModal({
                        title: 'ویرایش برچسب ',
                        body: response.data
                    })
                    removeContentLoading();
                }
            });
        });

        $(document).on('click', '.update-tag', function () {
            httpFormPostRequest($(this)).done(function (response) {
                setModalLoading();
                if (response.status === 200) {
                    successAlert(response.msg)
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000);
                }
                removeModalLoading();
            })
        });


        $(document).on('click', '.delete-tag', function () {
            swal({
                title: "از درخواست خود اطمینان دارید؟",
                text: "در صورت حذف شما دیگر به این مورد دسترسی نخواهید داشت",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        httpPostRequest($(this).attr('data-url'), {_method: 'delete'}).done(function (response) {
                            if (response.status === 200) {
                                successAlert(response.msg);
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
