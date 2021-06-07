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
    </script>
@endsection



