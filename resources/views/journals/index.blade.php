@extends('master')

@section('title','مجله')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">مجله</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('journals.partials.journals')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('click', '.delete-journal', function () {
            var elementClick = $(this);
            swal({
                title: "‌آیا از این درخواست اطمینان دارید ؟",
                text: "با حذف این مورد دیگر به این مورد دسترسی نخواهید داشت ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        httpPostRequest(elementClick.attr('data-url'), {_method: 'delete'}).done(function (response) {
                            if (response.status === 200) {
                                successAlert(response.msg);
                                setTimeout(function () {
                                    window.location.reload()
                                }, 2000)
                            }
                        });
                    }
                });

        });
    </script>
@endsection
