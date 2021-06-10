@extends('master')

@section('title','درباره ی ما')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">درباره ی ما</h3>
            </div>
            <div class="card-body">
                <hr>
                <form method="post" action="{{ route('pages.store') }}">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label>درباره ی ما</label>
                            <textarea class="form-control add-enter" rows="6"
                                      name="about">{!! optional($about)->value !!}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label>مقررات</label>
                            <textarea class="form-control add-enter" rows="10"
                                      name="rule">{!! optional($rule)->value !!}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-info store-info" type="button">ثبت</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        CKEDITOR.replace( 'about' );
        CKEDITOR.replace( 'rule' );
        CKEDITOR.replace( 'editor1' );
        $(document).on('click', '.store-info', function () {
            setContentLoading();
            httpFormPostRequest($(this)).done(function (response) {
                if (response.status == 200) {
                    successAlert(response.msg)
                }
                removeContentLoading();
                setTimeout(function () {
                    window.location.reload();
                }, 2000)

            })
        });
    </script>
@endsection
