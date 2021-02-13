@extends('master')

@section('title',trans('title.category-title'))

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">{{ trans('title.category-title') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @can('create-categories')
                            <button data-url-create="{{ route('categories.create') . '?parent_id=0' }}"
                                    class="create-categories btn btn-success">{{ trans('button.new-category') }}</button>
                        @endcan
                        @can('transfer-category')
                            <button
                                class="transfer-categories btn btn-primary">{{ trans('button.transfer-categories') }}</button>
                        @endcan
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <select class="select2 form-control"></select>
                    </div>
                </div>
                <div class="row mt-5">
                    {!! $categories !!}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        /*
        *   Show Form Create Categories
        */
        $(document).on('click', '.create-categories', function () {
            httpGetRequest($(this).attr('data-url-create')).done(function (response) {
                removeContentLoading()
                showModal({
                        body: response.data,
                        title: response.title,
                    }
                );
            })
        })

        /*
        *   Add New Input Form For Categories
        */
        $(document).on('click', '.add-new-form', function () {
            cloneHtml('category-sample-form-category');
        })

        /*
        * Remove Categories Input
        */
        $(document).on('click', '.remove-category-form', function () {
            deleteLastHtml('category-sample-form-category')
        });
        /*
        * Store Categories
         */
        $(document).on('click', '.store-category', function () {
            setModalLoading();
            return httpFormPostRequest($(this)).done(function (response) {
                if (response.status == 200) {
                    successAlert(response.msg);
                    removeModalLoading();
                }
            })
        });
        /*
        * Add Child Categories
        */
        $(document).on('click', '.add-categories', function () {
            httpGetRequest($(this).attr('data-url-create')).done(function (response) {
                removeContentLoading();
                showModal({body: response.data});
            })
        });

        /*
       * Show Edit Form Category
       */
        $(document).on('click', '.edit-categories', function () {
            targetElement = $(this);
            httpGetRequest(targetElement.attr('data-url-edit')).done(function (response) {
                removeContentLoading();
                showModal({body: response.data})
            });
        });

        /*
        * Edit Categories
        */
        $(document).on('click', '.update-category', function () {
            setModalLoading();
            return httpFormPostRequest($(this)).done(function (response) {
                removeContentLoading();
                if (response.status == 200) {
                    successAlert(response.msg);
                    removeModalLoading();
                }
            })
        });


        /*
        * Select For Transfer
        */
        categoriesId = [];
        $(document).on('click', '.transfer-categories', function () {
            categoriesId = [];
            $('input[type=checkbox]:checked').each(function () {
                categoriesId.push($(this).val())
            });
            if (categoriesId.length === 0) {
                errorAlert("هیچ موردی برای انتقال یافت نشد!")
            } else {
                httpGetRequest("{{ route('categories.transfer.form') }}").done(function (response) {
                    removeContentLoading();
                    showModal({body: response.data});
                    createSelect2Search("{{ route("categories.search") }}" + "?simple=true");
                });
            }
        });
        /*
        *   Transfer Categories
         */
        $(document).on('click', '.ajax-transfer-categories', function () {
            setModalLoading();
            httpPostRequest("{{ route('categories.transfer') }}", {
                category_parent_id: $('.select2').find(":selected").val(),
                id: categoriesId
            }).done(function (response) {
                removeModalLoading();
                if (parseInt(response.status) === 200) {
                    successAlert(response.msg);
                } else if (parseInt(response.status) === 403) {
                    errorAlert(response.msg);
                }
            });
        });

        createSelect2Search("{{ route('categories.search') }}")


        /*----------------------------------------------------------------------------------
        |                            Category Tree View
         -----------------------------------------------------------------------------------*/
        $(document).on('click', '.show-child', function () {
            var targetElement = $(this)
            if (targetElement.hasClass('fa-angle-down')) {
                targetElement.removeClass('fa-angle-down');
                targetElement.addClass('fa-angle-left');
                targetElement.closest('li').find('ul').slideToggle(700);
                setTimeout(function () {
                    targetElement.closest('li').find('ul').remove()
                }, 1000);
            } else if (targetElement.hasClass('fa-angle-left')) {
                targetElement.removeClass('fa-angle-left');
                targetElement.closest('li').find('ul').remove();
                targetElement.addClass('fa-angle-down');
                $.get(targetElement.attr('data-url-index'), function (response) {
                    targetElement.closest('a').after(response.data);
                    targetElement.closest('li').find('ul').hide();
                    targetElement.closest('li').find('ul').slideToggle(700);
                });
            }
        });


    </script>
@endsection
