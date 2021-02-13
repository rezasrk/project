@extends('master')

@section('title',trans('title.role-title'))

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">{{ trans('title.role-title') }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ isset($roles) ? route('roles.update',$roles->id) : route('roles.store') }}"
                      method="POST">
                    @if(isset($roles))
                        @method('PATCH')
                    @endif
                    @csrf
                    <div class="title-body">
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('validation.attributes.role_name') }}</label>
                                <input type="text" name="role_name" class="form-control"
                                       value="{{ isset($roles->name) ? $roles->name : '' }}">
                            </div>
                            <div class="col" style="margin-top: 30px">
                                <input checked type="checkbox" name="status">
                                <label>{{ trans('validation.attributes.status') }}</label>
                            </div>
                            <div class="col" style="margin-top: 30px">
                                    <button
                                        class="btn btn-info request-ajax-form">{{ trans('button.create-role') }}</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            {!! $grid !!}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection

