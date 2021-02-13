@extends('master')

@section('title', trans('title.list-warehouse'))

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">{{ trans('title.list-warehouse') }}</h3>
            </div>
            <div class="card-body">
                @include('supply.warehouse.partials.filter')
                <div class="show-main-warehouse">
                    @include('supply.warehouse.partials.warehouse')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function getQueryString(url) {
            var queryString = url.split('?');
            if (queryString.length === 2) {
                return queryString[1];
            }
            return null;
        }


        $(document).on('click', '.warehouse-action', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                removeModalLoading();
                showModal({
                    body: response.data,
                    title: 'MIV'
                })
            })
        });

        $(document).on('click', '.store-warehouse', function () {
            let targetElement = $(this);
            setModalLoading();
            httpFormPostRequest($(this)).done(function (response) {
                removeModalLoading();
                if (response.status === 200) {
                    successAlert(response.msg)
                }
                httpGetRequest(targetElement.attr('data-url'), false, true).done(function (response) {
                    $('.modal-body').html(response.data);
                    removeModalLoading();
                })

                httpGetRequest(window.location.href).done(function (response) {
                    if (response.status === 200) {
                        $('.show-main-warehouse').html(response.data);
                    }

                    removeContentLoading();
                })
            })
        });

        $(document).on('click', '.edit-warehouse', function () {
            httpGetRequest($(this).attr('data-url'), false, true).done(function (response) {
                $('.modal-body').html(response.data);
                customScroll('modal-body', -700)
                removeModalLoading();
            });
        });

        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            let targetElement = $(this);
            if ($(targetElement).closest('.warehouse').length === 1) {
                httpGetRequest($(targetElement).attr('href'), false, true).done(function (response) {
                    $('.modal-body').html(response.data);
                    removeContentLoading();
                })
            } else {
                window.location.href = targetElement.attr('href')
            }
        });

        createSelect2Search("{{ route('categories.search') }}")
    </script>
@endsection
