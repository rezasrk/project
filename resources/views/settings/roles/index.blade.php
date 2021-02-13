@extends('master')

@section('title',trans('title.role-title'))

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">{{ trans('title.role-title') }}</h3>
            </div>
            <div class="card-body">
                @can('create-roles')
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('roles.create') }}" class="btn btn-success"><i
                                    class="fa fa-plus"></i>{{ trans('link.add-new-roles')  }}</a>
                        </div>
                    </div>
                @endcan
                <hr>
                <div class="row">
                    {!! $grid !!}
                </div>
            </div>
        </div>
    </section>
@endsection
