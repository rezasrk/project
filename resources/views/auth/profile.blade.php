@extends('master')

@section('title',trans('title.profile-title'))

@section('content')
    <div class="row">
        <section class="col-lg-6 mt-3">
            <div class="card">
                <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title p-3">{{ trans('title.profile-title') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('change.information') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>{{ trans('validation.attributes.email') }}</label>
                                    <span class="form-control">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>{{ trans('validation.attributes.name') }}</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>{{ trans('validation.attributes.username') }}</label>
                                    <input type="text" name="username" class="form-control"
                                           value="{{ auth()->user()->username }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button
                                    class="btn btn-info request-ajax-form">{{ trans('button.update-profile') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="col-lg-6 mt-3">
            <div class="card">
                <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title p-3">{{ trans('title.profile-title') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('change.password') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>{{ trans('validation.attributes.password_old') }}</label>
                                    <input type="password" name="password_old" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>{{ trans('validation.attributes.password') }}</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>{{ trans('validation.attributes.password_confirm') }}</label>
                                    <input type="password" name="password_confirm" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button
                                    class="btn btn-info request-ajax-form">{{ trans('button.update-password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


@endsection
