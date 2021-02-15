@extends('master')

@section('title','دسته بندی')
@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">دسته بندی</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @can('create-categories')
                        <div class="col">
                            <button class="btn btn-success add-category">ثبت دسته بندی</button>
                        </div>
                    @endcan
                </div>
                <hr>
                @if($categories->count() > 0)
                    @include('categories.partials.category')
                @else
                    @include('partials.empty_table')
                @endif
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('click', '.add-category', function () {
            httpGetRequest("{{ route('categories.create') }}").done(function (response) {
                showModal({
                    title: 'ثبت دسته بندی',
                    body: response.data
                });
                removeContentLoading()
            })
        });

        $(document).on('click', '.store-category', function () {
            setModalLoading();
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg);
                    setTimeout(function(){
                        window.location.reload()
                    },2000);
                }
                removeModalLoading();
            });
        });

        $(document).on('change', '.category-type', function () {
            setModalLoading();
            httpGetRequest($(this).find(':selected').attr('data-url')).done(function (response) {
                $('.category-parent').html(response.data);
                removeModalLoading()
            });
        });

        $(document).on('click', '.edit-category', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                showModal({
                    body: response.data,
                    title: 'ویرایش دسته بندی'
                });
                removeModalLoading()
            })
        });
    </script>
@endsection
