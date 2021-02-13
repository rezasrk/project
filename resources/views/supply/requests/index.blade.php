@extends('master')

@section('title', trans('title.list-request'))

@section('content')

    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">{{ trans('title.list-request') }}</h3>
            </div>
            <div class="card-body">
                @include('supply.requests.partials.filter')
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            @can('create-request')
                                <button
                                    class="btn btn-success add-new-requests">{!! trans('button.create-request') !!}</button>
                            @endcan
                            @can('list-action-request')
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger">{{ trans('button.action') }}</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        @foreach($conditionRequests as $condKey=>$condValue)
                                            @can(optional($baseInfo->getExtra($condKey))->permission)
                                                <a class="pointer dropdown-item {{ $condKey == 94 ? 'assign_request' : 'action-request' }}"
                                                   data-url="{{ route('action',$condKey) }}">{{ $condValue }}</a>
                                            @endcan
                                        @endforeach
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="show-request-list mt-4 col-md-12">
                        @include('supply.requests.partials.request')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        createSelect2Search("{{ route('action.get.user') }}")
        /*
        * Add new request popup
         */
        $(document).on('click', '.add-new-requests', function () {
            httpGetRequest("{{ route('request.create') }}").done(function (response) {
                showModal({
                    body: response.data,
                    title: 'ثبت درخواست'
                });
                removeModalLoading();
                createSelect2Search("{{ route("categories.search") }}")
            });
        });

        /*
        * Show unit from category
         */
        $(document).on('change', '.get-unit', function () {
            var targetElement = $(this);
            httpPostRequest("{{ route('categories.unit') }}", {id: $(this).find(':selected').val()}).done(function (response) {
                $(targetElement).closest('.row').find('.show-unit').html(response.data);
            });
        });


        $(document).on('click', '.add-form', function () {
            cloneHtml('sample-category-form');
            createSelect2Search("{{ route("categories.search") }}");
            customScroll();
            $('[name^=request_detail_id]:last').val(0)
        });

        $(document).on('click', '.delete-html', function () {
            deleteLastHtml('sample-category-form')
        })


        $(document).on('click', '.store-categories', function () {
            setModalLoading();
            httpFormPostRequest($(this)).done(function (response) {
                removeModalLoading();
                if (response.status == 200) {
                    successAlert(response.msg);
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000)
                } else {
                    errorAlert(response.msg)
                }
            });
        });


        $(document).on('click', '.edit-request', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                showModal({
                    body: response.data,
                    title: 'ویرایش درخواست',
                });
                removeModalLoading();
                createSelect2Search("{{ route("categories.search") }}", false)
            });
        });


        $(document).on('click', '.mrs', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                showModal({
                    body: response.data,
                    title: 'MRS',
                    size: 'modal-2xlg'

                });
                removeModalLoading();
            });
        });


        $(document).on('change', '.mrs-input', function () {
            let data = $(this).closest('.card').find(":input").serialize();
            httpPostRequest("{{ route('mrs') }}", data);
        });


        $(document).on('click', '.add-new-mrs-form', function () {
            let targetElement = $(this)
            let targetForm = $(targetElement).closest('.card-body').find('.sample-mrs-form:last');
            let cloneHtml = $(targetForm).html();
            $(targetForm).after("<hr class='border-hr-info'><div class='row sample-mrs-form'>" + cloneHtml + "<div>");
            $(targetElement).closest('.card-body').find('.sample-mrs-form:last').find("input[type=text]").val('');
            $(targetElement).closest('.card-body').find('.sample-mrs-form:last').find("textarea").html('');
            $(targetElement).closest('.card-body').find('.sample-mrs-form:last').find("select[name^=unit_price]").val(45).trigger('cahnge');
            $(targetElement).closest('.card-body').find('.sample-mrs-form:last').find("select[name^=shop_id]").val(1).trigger('cahnge');
        });

        $(document).on('click', '.remove-mrs-form', function () {
            let targetElement = $(this)
            let targetForm = $(targetElement).closest('.card-body').find('.sample-mrs-form');
            if (targetForm.length > 1) {
                targetForm.last().remove()
            } else {
                errorAlert('این مورد امکان حذف شدن ندارد!')
            }
        });


        $(document).on('click', '.show-miv', function () {
            httpGetRequest($(this).attr('data-url'), false, true).done(function (response) {
                removeModalLoading();
                $('.modal-title').html('MIV');
                $('.modal-body').html(response.data);
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
            })
        });


        $(document).on('click', '.back-to-mrs', function () {
            httpGetRequest($(this).attr('data-url'), false, true).done(function (response) {
                removeModalLoading();
                $('.modal-title').html('MRS');
                $('.modal-body').html(response.data);
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


        $(document).on('click', '.edit-warehouse', function () {
            httpGetRequest($(this).attr('data-url'), false, true).done(function (response) {
                $('.modal-body').html(response.data);
                customScroll('modal-body', -700)
                removeModalLoading();
            });
        });


        $(document).on('click', '.attachment', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                showModal({
                    body: response.data,
                    title: 'آپلود فایل'
                });
                removeContentLoading();
            })
        });

        $(document).on('click', '.upload-file', function () {
            let targetElement = $(this);
            setModalLoading();
            httpFormPostRequest($(targetElement)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg)
                    httpGetRequest($(targetElement).attr('data-url'), false, true).done(function (response) {
                        $('.modal-body').html(response.data);
                        removeModalLoading();
                    })
                }
            })
        });


        $(document).on('click', '.edit-file', function () {
            httpGetRequest($(this).attr('data-url'), false, true).done(function (response) {
                removeModalLoading();
                $('.modal-body').html(response.data);
            })
        });


        $(document).on('click', '.request-comment', function () {
            httpGetRequest($(this).attr('data-url')).done(function (response) {
                showModal({
                    body: response.data,
                    title: 'یادداشت'
                });
                removeContentLoading();
            });
        });


        $(document).on('click', '.store-comment', function () {

            let targetElement = $(this);
            setModalLoading();
            httpFormPostRequest($(targetElement)).done(function (response) {
                if (response.status === 200) {
                    successAlert(response.msg);
                    httpGetRequest(targetElement.attr('data-url'), false).done(function (response) {
                        if (response.status === 200) {
                            showModal({
                                body: response.data
                            });
                            removeModalLoading();
                        }
                    });
                }
            });
        });

        requestIds = [];

        function getRequestId() {
            let targetElement = $(this);
            requestIds = [];
            $('.get-request-ids:checked').each(function () {
                requestIds.push($(this).val());
            });
        }


        $(document).on('click', '.action-request', function () {
            getRequestId();
            var targetElement = $(this);
            if (requestIds.length > 0) {
                httpPostRequest($(targetElement).attr('data-url'), {ids: requestIds}).done(function (response) {
                    removeContentLoading();
                    if (response.status === 200) {
                        successAlert(response.msg);
                        setTimeout(function () {
                            window.location.reload()
                        }, 1000)
                    }
                });
            } else {
                errorAlert('هیچ موردی برای انجام عملیات انتخاب نشده است !')
                removeContentLoading();
            }
        });

        $(document).on('click', '.assign_request', function () {
            assignHtml = "" +
                "<div class='row'><div class='col-md-12'>" +
                "<label>نام کاربر</label>" +
                "<select class='form-control select2 select-user'></select>" +
                "<hr>" +
                "<button class='btn btn-info assign-store'>اضافه کردن کاربر</button>" +
                "</div>" +
                "</div>";

            showModal({
                body: assignHtml,
            });
            createSelect2Search("{{ route('action.get.user') }}")
        });

        $(document).on('click', '.assign-store', function () {
            setModalLoading();
            getRequestId();
            if (requestIds.length > 0) {
                httpPostRequest("{{ route('assign.user') }}", {
                    ids: requestIds,
                    user: $('.select-user').find(':selected').val()
                }).done(function (response) {
                    if (response.status === 200) {
                        successAlert(response.msg)
                        removeModalLoading();
                        window.location.reload()
                    }
                })
            } else {
                errorAlert('هیچ موردی برای انجام عملیات انتخاب نشده است !')
            }

        });
    </script>
@endsection
